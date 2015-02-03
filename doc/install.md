Install
=======

The installer add a instance defaultTranslationService to use the direct function without instance. This installer checkes if there are a class that implement LanguageTranslatorInterface to bind it automatically to the defaultTranslationService.

Bind another instance
---------------------

The FineCacadingTranslator class is to cascading all your translator. If the first doesn't have the translation, the second is requested....
The first translator how has the response is returned. So the order of translators is very important.

Found the defaultTranslationService instance in Mouf, click on it.
There is a table of TranslatorInterface
![Fine default instance screenshot](https://raw.github.com/thecodingmachine/utils.i18n.fine.common/4.0/doc/images/01_default_instance.png)

To add a new instance, please click on add an instance, don't forget to configure it!
![Fine add instance screenshot](https://raw.github.com/thecodingmachine/utils.i18n.fine.common/4.0/doc/images/02_add_instance.png)

To change the order, just drag and drop the instance before or after another
![Fine instance order screenshot](https://raw.github.com/thecodingmachine/utils.i18n.fine.common/4.0/doc/images/03_instance_order.png)

Your package is ready!
