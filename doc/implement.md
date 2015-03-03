Using
=====

Interface
---------

The interface EditTranslationInterface can be implement to use the Mouf interface on the translator. Many new method must be implement to recover, save and edit a translation.
- getTranslationsForLanguage($language): Return an array with all the translation for a language (code on 2 characters). The key is the fine key and the value is the translation.
- getTranslationsForKey($language): Return an array with all the translation for a language (code on 2 characters). The key is the fine key and the value is the translation.
- deleteTranslation($key, $language = null): Remove a translation for a language (code on 2 characters).
- setTranslation($key, $value, $language): Set the translation for a key and language. The value is the string of the translation.
- setTranslationsForLanguage(array $messages, $language): Set many translation to save it. The messages array is an associate table with in key, the fine key and the value, the string translation.
- setTranslationsForKey(array $messages, $key): Set many translation to save it. The messages array is an associate table with in key, the language and the value, the string translation.
- getAllTranslationByLanguage(): This function return an 2 dimensions array. The first key is the language code on 2 characters and the value is an associate array, the key is the fine key and the value is the translation string.
- getLanguageList(): Return an array with all language (code on 2 characters).
- getAllKey(): Return an array with all the key.

Trait
-----

You can use this trait to implement some method for Mouf interface. It's is not mandatory, but is more easier to use it.
- setTranslationsForLanguage: Save many translations in one time, for one language. This function call the setTranslation for each values.
- setTranslationsForKey: Save many translations in one time, for one key. This function call the setTranslation for each values.
- getAllTranslationByLanguage: This function call the function getLanguageList and the getTranslationForLanguage.
- getAllKey: return the key of the getAllTranslationByLanguage result.

Utils
-----
The class EditTranslationUtils contains a static value getAllPossibleLanguages to get all the possible language.

Proxy connection
----------------

This class contains method to call the api via a curl mouf proxy.
- getAllMessagesFromService: Get all translation.
- getTranslationsForKeyFromService: Get all translation for a key.
- setTranslationsForKeyFromService: Send a translation for a key.
- setTranslationsForMessageFromService: Set all messages.
- setTranslationForMessageFromService: Set one message.
- deleteTranslationFromService: Delete a translation with the fine key. It's possible to set the language to delete a specific value.  
