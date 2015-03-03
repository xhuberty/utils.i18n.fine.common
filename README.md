What is this package
====================
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/thecodingmachine/utils.i18n.fine.common/badges/quality-score.png?b=4.0)](https://scrutinizer-ci.com/g/thecodingmachine/utils.i18n.fine.common/?branch=4.0)

This package contains all the functions, classes and installer to easily use fine in Muof.

A list of packages using those interfaces:

- [Fine](http://mouf-php.com/packages/mouf/utils.i18n.fine.file-translator/README.md): Fine Is Not English, the default translation package for the Mouf framework.

Mouf package
------------

This package is part of Mouf (http://mouf-php.com), an effort to ensure good developing practices by providing a graphical dependency injection framework.


Dependencies
------------

Fine comes as a *Composer* package and requires the "Mouf" framework to run.
The first step is therefore to [install Mouf](http://www.mouf-php.com/).

Once Mouf is installed, you can process to the Fine installation.

Install Fine
--------------

At the same time please add a translation store system link utils.i18n.fine.file-translator, or another.
Edit your *composer.json* file, and add a dependency on *mouf/utils.i18n.fine.common*.

A minimal *composer.json* file might look like this:
```
	{
	    "require": {
	        "mouf/mouf": "~2.0",
	        "mouf/utils.i18n.fine.common": "4.0.*"
	    },
	    "autoload": {
	        "psr-0": {
	            "Test": "src/"
	        }
	    },
	    "minimum-stability": "dev"
	}
```
As explained above, Fine is a package of the Mouf framework. Mouf allows you (amoung other things) to visualy "build" your project's dependencies and instances.

To install the dependency, run
	php composer.phar install

This package contains
---------------------

###Installer

The installer create default instance and automatically bind the translator.

###Default class

This package addes a fine cascading translator to bind many instance of TranslatorInterface. The first translation found is returned, also the next translation is checked.
Edit the instance in Mouf to add or change the order in cascading translator.

###Functions

There are 2 functions addes to simplify the language access.
- iMsg function: Return the translation of the key, parameters (in option) and LanguageDetection (in option)
- eMsg function: Do an echo of iMsg

###Interface

The interface EditTranslationInterface can be implement to use the Mouf interface on the translator. Many new method must be implement to recover, save and edit a translation.

###Trait

You can use this trait to implement some method of the interface.
