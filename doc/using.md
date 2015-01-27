Using
=====

In your code, you can use the functions. There are bind automatically to the defaultTranslationService:

- iMsg function: Return the translation of the key, parameters (in option) and LanguageDetection (in option)
- eMsg function: Do an echo of iMsg

Example:
```php
$string = iMsg('mykey', array('parameter1' => 'value'));
eMsg('mykey', array('parameter1' => 'value'));
```

It's possible to add an instance of LanguageDetectionInterface (for exemple to change the language in the middle of your code.
Exemple of using:
In this controller you have bind an instance of LanguageDetetionInterface named $fixEnglishLanguage
So you can call the function with
iMsg('myKey', array('parameter1' => 'value'), $this->fixEnglishLanguage);