Install
=======

The installer add a instance defaultTranslationService to use the direct function without instance. This installer checkes if there are a class that implement LanguageTranslatorInterface to bind it automatically to the defaultTranslationService.

Bind another instance
---------------------

The FineCacadingTranslator class is to cascading all your translator. If the first doesn't have the translation, the second is requested....
The first translators how has the response is return. So the order of translators is very important.

Found the defaultTranslationService instance in Mouf, click on it.
There is a table of LanguageTranslationInterface
IMAGE

TO add a new instance, please click on add an instance, don't forget to configure it!
IMAGE

To change the order, just drag and drop the instance before or after another
IMAGE

Your package is ready!
