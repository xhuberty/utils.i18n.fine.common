<?php
/*
 * Copyright (c) 2012-2015 Marc TEYSSIER
 *
 * See the file LICENSE.txt for copying permission.
 */
namespace Mouf\Utils\I18n\Fine\Common;

use Mouf\Utils\I18n\Fine\TranslatorInterface;
use Mouf\Utils\I18n\Fine\LanguageDetectionInterface;

/**
 * This element can cascading the language translation to search the first with a translation
 *
 * @author Marc TEYSSIER
 */
class FineCascadingTranslator implements TranslatorInterface
{
    /**
     * List of all translator in order of priority
     *
     * @var array<\Mouf\Utils\I18n\Fine\TranslatorInterface>
     */
    private $translators = array();

    /**
     * 
     * @param array<\Mouf\Utils\I18n\Fine\TranslatorInterface> $translators
     */
    public function __construct(array $translators = array())
    {
        $this->translators = $translators;
    }

    /**
     * Check all translators to retrieve message in the order. When there is one translation, the function return the message (of the first found).
     * If the message doesn't exist return null
     *
     * @param $message string This is the key of translation search
     * @param $parameters array All parameters to customize message
     * @param LanguageDetectionInterface $languageDetection Set it if you want to force the language to another value
     * @return string|null
     */
    public function getTranslation($message, array $parameters = array(), LanguageDetectionInterface $languageDetection = null)
    {
        foreach ($this->translators as $translator) {
            $tranlation = $translator->getTranslation($message, $parameters, $languageDetection);
            if ($tranlation !== null) {
                return $tranlation;
            }
        }

        return;
    }
}
