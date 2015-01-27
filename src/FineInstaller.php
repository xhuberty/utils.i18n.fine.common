<?php
namespace Mouf\Utils\I18n\Fine\Commmon;

use Mouf\Installer\PackageInstallerInterface;
use Mouf\MoufManager;
use Mouf\Actions\InstallUtils;

/**
 * A logger class that writes messages into the php error_log.
 */
class FineInstaller implements PackageInstallerInterface
{

    /**
     * (non-PHPdoc)
     * @see \Mouf\Installer\PackageInstallerInterface::install()
     */
    public static function install(MoufManager $moufManager)
    {
        /*
        //FineFileTranslatorService
        if ($moufManager->instanceExists("defaultTranslationService")) {
            $defaultTranslationService = $moufManager->getInstanceDescriptor("defaultTranslationService");
        } else {
            $defaultTranslationService = $moufManager->createInstance("Mouf\\Utils\\I18n\\Common\\FineCascadingTranslator");
            $defaultTranslationService->setName("defaultTranslationService");
        }
        */
        $defaultTranslationService = InstallUtils::getOrCreateInstance("defaultTranslationService", "Mouf\\Utils\\I18n\\Common\\FineCascadingTranslator", $moufManager);

        // Let's rewrite the MoufComponents.php file to save the component
        $moufManager->rewriteMouf();
    }
}
