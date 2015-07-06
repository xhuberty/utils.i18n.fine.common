<?php
namespace Mouf\Utils\I18n\Fine\Common;

use Mouf\Utils\I18n\Fine\TranslatorInterface;
use Mouf\Utils\Value\ValueUtils;
use Mouf\Utils\Value\ValueInterface;

class Translator implements ValueInterface {
    /**
     * Instance find translation
     * @var TranslatorInterface
     */
    private $languageTranslationInterface;

    /**
     * Key to search translation
     * @var string|ValueInterface
     */
    private $key;

    /**
     *
     * @param TranslatorInterface $languageTranslationInterface
     * @param string $key
     * @Important
     */
    public function __construct(TranslatorInterface $languageTranslationInterface, $key) {
        $this->languageTranslationInterface = $languageTranslationInterface;
        $this->key = $key;
    }

    /**
     * Returns the value represented by this object.
     *
     * @return string
     */
    public function val() {
        return $this->languageTranslationInterface->getTranslation(ValueUtils::val($this->key));
    }
}