<?php
/*
 * Copyright (c) 2012-2015 Marc Teyssier
 *
 * See the file LICENSE.txt for copying permission.
 */
namespace Mouf\Utils\I18n\Fine\Common\Ui;

/**
 * Used to translation message
 *
 * @author Marc Teyssier
 *
 */
interface EditTranslationInterface
{


	/**
	 * Return the list of all translation. The table has 2 dimensions.
	 * The first is the language.
	 * The second is the key/value of translation
	 *
	 * @return array<string, array<string, string>> Translations
	 */
	public function getAllTranslationByLanguage();
	
    /**
     * Return a list of all message for a language.
     *
     * @param  string        $language Language
     * @return array<string, string> List with key value of translation
     */
    public function getTranslationsForLanguage($language);

    /**
     * Return a list of all message for a language.
     *
     * @param  string        $key Fine key
     * @return array<string, string> List with key value of translation
     */
    public function getTranslationsForKey($key);
    
    /**
     * Delete a translation for a language. If the language is not set or null, this function deletes the translation for all language.
     *
     * @param string      $key      Key to remove
     * @param string|null $language Language to remove key or null for all
     */
    public function deleteTranslation($key, $language = null);

    /**
     * Add or change a translation
     *
     * @param string $key      Key of translation
     * @param string $value    Message of translation
     * @param string $language Language to add translation
     */
    public function setTranslation($key, $value, $language);

    /**
     * Add or change many translations in one time, for a language
     * The table index is the key that you want change
     *
     * @param array<string, string> $messages List with key value of translation
     * @param string                $language Language to add translation
     */
    public function setTranslationsForLanguage(array $messages, $language);

    /**
     * Add or change many translations in one time, for a key
     * The table index is the language that you want change
     *
     * @param array<string, string> $messages List with key language of translation
     * @param string                $key Key to add translation
     */
    public function setTranslationsForKey(array $messages, $key);

    /**
     * Liste of all language supported
     *
     * @return array<string>
     */
    public function getLanguageList();

    /**
     * Return an array with all the key create without language checking
     *
     * @return array<string> All key
     */
    public function getAllKey();
}
