<?php
use Mouf\MoufManager;
use Mouf\Utils\I18n\Fine\Language\LanguageDetectionInterface;

/*
 * Copyright (c) 2012-2015 Marc TEYSSIER
 *
 * See the file LICENSE.txt for copying permission.
 */

/*
 * Avoid function re-declaration
 */
if (!function_exists("iMsg")) {

    /**
     * This function return the translation of a code or a sentence for a language.
     * The language is selected in the translation service. It's possible to force it for a specific translation with the parameter languageDetectionInterface.
     * The translation is searched in the translation instance. This class must by implements the TranslationInterface. The getTranslation method return the translation for a key for a language or null.
     *
     *
     * @param $key string Code, sentence or key for the translation
     * @param $parameters array The index is the value set between {} in message and the value is the value
     * @param $languageDetectionInterface LanguageDetectionInterface This value is not mandatory. By default the language set in translationService is used. But it is possible to force it ofr a translation.
     * @return string Return the translation
     */
    function iMsg($key, array $parameters = array(), LanguageDetectionInterface $languageDetectionInterface = null)
    {
        if (!$languageDetectionInterface) {
            static $translationService = null;
            if ($translationService === null) {
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
     * Do an echo of iMsg return
     *
     * @param $key string Code, sentence or key for the translation
     * @param $parameters array The index is the value set between {} in message and the value is the value
     * @param $languageDetectionInterface LanguageDetectionInterface This value is not mandatory. By default the language set in translationService is used. But it is possible to force it ofr a translation.
     */
    function eMsg($key, array $parameters = array(), LanguageDetectionInterface $languageDetectionInterface = null)
    {
        echo iMsg($key, $parameters, $languageDetectionInterface);
    }
}
