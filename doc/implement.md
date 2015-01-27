Using
=====

Interface
---------

The interface EditTranslationInterface can be implement to use the Mouf interface on the translator. Many new method must be implement to recover, save and edit a translation.
- getTranslationForLanguage($language): Return an array with all the translation for a language (code on 2 characters). The key is the fine key and the value is the translation.
- deleteTranslation($key, $language = null): Remove a translation for a language (code on 2 characters).
- setTranslation($key, $value, $language): Set the translation for a key and language. The value is the string of the translation.
- setTranslations(array $messages, $language): Set many translation to save it. the messages array is an asssociate table with in key, the fine key and the value, the string translation.
- getAllTranslationByLanguage(): This function return an 2 dimensions array. The first key is the language code on 2 characters and the value is an associate array, the key is the fine key and the value is the translation string.
- getLanguageList(): Return an array with all language (code on 2 characters).
- getAllKey(): Return an array with all the key.

Trait
-----

You can use this trait to implement some method for Mouf interface. It's is not mandatory, but is more easier to use it.
- setTranslations: Save many translations in one time. This function call the setTranslation for each values.
- getAllTranslationByLanguage: This function call the function getLanguageList and the getTranslationForLanguage.
- getAllKey: return the key of the getAllTranslationByLanguage result.
