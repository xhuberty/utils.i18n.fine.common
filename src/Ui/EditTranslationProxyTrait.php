<?php
/*
 * Copyright (c) 2012-2015 Marc Teyssier
 *
 * See the file LICENSE.txt for copying permission.
 */
namespace Mouf\Utils\I18n\Fine\Common\Ui;

use Mouf\InstanceProxy;

/**
 * This trait help you to create your own human interface in Mouf.
 * It make a bind to the translator to retrieve, add, edit or remove a translation
 *
 * @author Marc TEYSSIER
 *
 */
trait EditTranslationProxyTrait
{

    /**
     * Returns the list of all messages in all languages by making a CURL call. It is possible to set a language to retrieve only the associated message.
     *
     * @param  bool      $selfEdit
     * @param  string    $msgInstanceName
     * @param  string    $language
     * @return array
     * @throws Exception
     */
    protected function getAllMessagesFromService($selfEdit, $msgInstanceName = "defaultTranslationService", $language = null)
    {
        $translationService = new InstanceProxy($msgInstanceName, $selfEdit);

        return $translationService->getAllTranslationByLanguage($language);
    }

    /**
     * Returns all the translation of one key by making a CURL call.
     *
     * @param  bool      $selfEdit
     * @param  string    $msgInstanceName
     * @param  string    $key
     * @return array
     * @throws Exception
     */
    protected function getTranslationsForKeyFromService($selfEdit, $msgInstanceName, $key)
    {
        $translationService = new InstanceProxy($msgInstanceName, $selfEdit);

        return $translationService->getTranslationsForKey($key);
    }

    protected function setTranslationsForKeyFromService($selfEdit, $msgInstanceName, $key, $translations)
    {
        $translationService = new InstanceProxy($msgInstanceName, $selfEdit);

        return $translationService->setTranslationsForKey($translations, $key);
    }

    /**
     * Saves many translations for one key and one language using CURL.
     *
     * @param  bool      $selfEdit
     * @param  string    $msgInstanceName
     * @param  string    $language
     * @param  array     $translations
     * @return boolean
     * @throws Exception
     */
    protected function setTranslationsForMessageFromService($selfEdit, $msgInstanceName, $language, $translations)
    {
        $translationService = new InstanceProxy($msgInstanceName, $selfEdit);

        return $translationService->setMessages($translations, $language);
    }

    /**
     * Saves the translation for one key and one language using CURL.
     *
     * @param  bool      $selfEdit
     * @param  string    $msgInstanceName
     * @param  string    $key
     * @param  string    $label
     * @param  string    $language
     * @param  string    $delete
     * @return boolean
     * @throws Exception
     */
    protected function setTranslationForMessageFromService($selfEdit, $msgInstanceName, $key, $label, $language, $delete)
    {
        if ($delete) {
            $translationService = new InstanceProxy($msgInstanceName, $selfEdit);

            return $translationService->deleteMessage($key, $language);
        } else {
            $translationService = new InstanceProxy($msgInstanceName, $selfEdit);

            return $translationService->setMessage($key, $label, $language);
        }
    }

    /**
     * Adds a new translation language using CURL.
     *
     * @param  bool      $selfEdit
     * @param  string    $msgInstanceName
     * @param  string    $language
     * @return boolean
     * @throws Exception
     */
    protected function deleteTranslationFromService($selfEdit, $msgInstanceName, $key, $language = null)
    {
        $finePhpArrayTranslationService = new InstanceProxy($msgInstanceName, $selfEdit);
        $finePhpArrayTranslationService->deleteTranslation($key, $language);
    }
}
