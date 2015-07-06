<?php
namespace Mouf\Utils\I18n\Fine\Common;

use Mouf\Installer\PackageInstallerInterface;
use Mouf\MoufManager;
use Mouf\Actions\InstallUtils;

/**
 * Installer for common fine package. This create a defaultTranslationService
 */
class FineInstaller implements PackageInstallerInterface
{

    /**
     * (non-PHPdoc)
     * @see \Mouf\Installer\PackageInstallerInterface::install()
     */
    public static function install(MoufManager $moufManager)
    {
        $defaultTranslationService = InstallUtils::getOrCreateInstance("defaultTranslationService", "Mouf\\Utils\\I18n\\Fine\\Common\\FineCascadingTranslator", $moufManager);

        //FineFileTranslatorService
        if (!$moufManager->instanceExists("fileTranslatorService")) {
            $cascadingLanguageDetection = null;
            if($moufManager->instanceExists('cascadingLanguageDetection')) {
                $cascadingLanguageDetection = $moufManager->getInstanceDescriptor("cascadingLanguageDetection");
            }

            $fileTranslator = $moufManager->createInstance("Mouf\\Utils\\I18n\\Fine\\Translator\\FileTranslator");
            $fileTranslator->setName("fileTranslatorService");
            $fileTranslator->getProperty("i18nMessagePath")->setValue("resources/");

            if($cascadingLanguageDetection) {
                $fileTranslator->getProperty("languageDetection")->setValue($cascadingLanguageDetection);
            }

            $translators = $defaultTranslationService->getProperty('translators')->getValue();
            $translators[] = $fileTranslator;
            $defaultTranslationService->getProperty('translators')->setValue($translators);
        }

        // Let's rewrite the MoufComponents.php file to save the component
        $moufManager->rewriteMouf();
    }
}
