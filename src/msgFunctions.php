<?php
use Mouf\MoufManager;
use Mouf\Utils\I18n\LanguageDetectionInterface;

/*
 * Copyright (c) 2012-2015 Marc TEYSSIER
 *
 * See the file LICENSE.txt for copying permission.
 */

/**
 * This function return the translation of a code or a sentence for a language.
 * The language is selected by the detection class instantiated. This class must by implements the LanguageDetectionInterface. By default for the application, the instance is translateService.
 * The translation is searched in the translation instance. This class must by implements the TranslationInterface. The getTranslation method return the translation for a key for a language.
 *
 *
 * @param $key string Code, sentence or key for the translation
 * @param ... array Parameters of variable elements in the translation. These elements are associate table, you write {key} in your translation.
 * @return string Return the translation
 */
/*
 * Avoid function re-declaration
 */
if (!function_exists("iMsg")) {
    function iMsg($key, array $parameters = array(), LanguageDetectionInterface $languageDetectionInterface = null)
    {
        if (!$languageDetectionInterface) {
            static $translationService = null;
            if ($translationService == null) {
                /* @var $translationService TranslationInterface */
                $translationService = MoufManager::getMoufManager()->getInstance("defaultTranslationService");
            }
        } else {
            $translationService = $languageDetectionInterface;
        }

        $translation = $translationService->getTranslation($key, $parameters, $languageDetectionInterface);
        if ($translation === null) {
            return '???'.$key.'???';
        }

        return $translation;
    }

    /**
     * Do an echo for the iMsg return
     *
     * @param string $key
     * @param ... string Parameters of variable elements in the translation. These elements are wrote {0} for the first, {1} for the second ...
     */
    function eMsg($key, array $parameters = array(), LanguageDetectionInterface $languageDetectionInterface = null)
    {
        echo iMsg($key, $parameters, $languageDetectionInterface);
    }
}
