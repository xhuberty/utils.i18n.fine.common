<?php
/*
 * Copyright (c) 2012 David Negrier
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
trait EditTranslationHelperTrait
{

    /**
     * Add or change many translations in one time
     *
     * @param array<string, string> $messages List with key value of translation
     * @param string                $language Language to add translation
     */
    public function setTranslationsForLanguage(array $messages, $language)
    {
        foreach ($messages as $key => $value) {
            $this->setTranslation($key, $value, $language);
        }
    }

    /**
     * Add or change many translations in one time
     *
     * @param array<string, string> $messages List with key value of translation
     * @param string                $language Language to add translation
     */
    public function setTranslationsForKey(array $messages, $key)
    {
    	foreach ($messages as $language => $value) {
    		$this->setTranslation($key, $value, $language);
    	}
    }

    /**
     * Return the list of all translation. The table has 2 dimensions.
     * The first is the language.
     * The second is the key value of translation
     *
     * @return array<string, array<string, string>> Translations
     */
    public function getAllTranslationByLanguage()
    {
        $messages = array();
        foreach ($this->getLanguageList() as $language) {
            $messages[$language] = $this->getTranslationsForLanguage($language);
        }

        return $messages;
    }

    /**
     * Return an array with all the key create without language checking
     *
     * @return array<string> All key
     */
    public function getAllKey()
    {
        $keys = array();
        // First, let's merge all the arrays in order to get all the keys:
        foreach ($this->getAllTranslationByLanguage() as $translations) {
            $keys = array_merge($key, $translations);
        }

        return array_keys($keys);
    }
}
