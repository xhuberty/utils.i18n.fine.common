<?php
/*
 * Copyright (c) 2012-2015 Marc TEYSSIER
 *
 * See the file LICENSE.txt for copying permission.
 */
namespace Mouf\Utils\I18n\Fine\Common;

use Mouf\Utils\I18n\Fine\LanguageTranslationInterface;

/**
 * This element can cascading the language translation to search the first with a translation
 *
 * @Component
 * @author Marc TEYSSIER
 */
class FineCascadingTranslator implements LanguageTranslationInterface
{
    /**
     * List of all translator in order of priority
     *
     * @var array<\Mouf\Utils\I18n\Fine\LanguageTranslationInterface>
     */
    private $translators = array();

    public function __construct($translators = array())
    {
        $this->translators = $translators;
    }

    /**
     * Check all translators to retrieve message in the order. When there is one translation, the function return the message (of the first found).
     * If the message doesn't exist return null
     *
     * @param $message string This is the key of translation search
     * @param $parameters array All parameters to customize message
     * @return string|null
     */
    public function getTranslation($message, array $parameters = array())
    {
        echo 'oui aaa';
        foreach ($this->translators as $translator) {
            $tranlation = $translator->getTranslation($message, $parameters);
            if ($tranlation !== null) {
                return $tranlation;
            }
        }

        return;
    }
}
