.. include:: ../../Includes.txt

.. _addFinishers:


Add Finishers Classes
^^^^^^^^^^^^^^^^^^^^^

Introduction
""""""""""""

Let's say you want to easily add some own php functions,
that should be called after a user submits a form.
Maybe you want to handle the user input with:

* Send it to an API
* Store it in a logfile
* Save it into a table
* Something else...

Small example
"""""""""""""

Just define which classes should be used. Every method like \*Finisher() will be called - e.g. myFinisher():

::

   plugin.tx_powermail.settings.setup {
       finishers {
           1 {
               class = Vendor\Ext\Finisher\DoSomethingFinisher
           }
       }
   }


Add a php-file and extend your class with the AbstractFinisher from powermail:
::

   <?php
   namespace Vendor\Ext\Finisher;

   use In2code\Powermail\Finisher\AbstractFinisher;

   /**
    * Class DoSomethingFinisher
    *
    * @package Vendor\Ext\Finisher
    */
   class DoSomethingFinisher extends AbstractFinisher {

       /**
        * MyFinisher
        *
        * @return void
        */
       public function myFinisher() {
           // ...
       }
   }

Extended example
""""""""""""""""

See the advanced example with some configuration
in TypoScript and with the possibility to load the file
(useful if file could not be loaded from autoloader
because it's stored in fileadmin or elsewhere)

::

   plugin.tx_powermail.settings.setup {
       finishers {
           1 {
               # Classname that should be called with method *Finisher()
               class = Vendor\Ext\Finisher\DoSomethingFinisher

               # optional: Add configuration for your PHP
               config {
                   foo = bar

                   fooCObject = TEXT
                   fooCObject.value = do something with this text
               }

               # optional: If file will not be loaded from autoloader, add path and it will be called with require_once
               require = fileadmin/powermail/finisher/DoSomethingFinisher.php
           }
       }
   }



Add your php-file again and extend your class with the AbstractFinisher from powermail:
::

   <?php
   namespace Vendor\Ext\Finisher;

   use In2code\Powermail\Domain\Model\Mail;
   use In2code\Powermail\Finisher\AbstractFinisher;

   /**
    * Class DoSomethingFinisher
    *
    * @package Vendor\Ext\Finisher
    */
   class DoSomethingFinisher extends AbstractFinisher {

       /**
        * @var Mail
        */
       protected $mail;

       /**
        * @var array
        */
       protected $configuration;

       /**
        * @var array
        */
       protected $settings;

       /**
        * Will be called always at first
        *
        * @return void
        */
       public function initializeFinisher() {
       }

       /**
        * Will be called before myFinisher()
        *
        * @return void
        */
       public function initializeMyFinisher() {
       }

       /**
        * MyFinisher
        *
        * @return void
        */
       public function myFinisher() {
           // get value from configuration
           $foo = $this->configuration['foo'];

           // get subject
           $subject = $this->getMail()->getSubject();

           // ...
       }
   }

Some notices
""""""""""""

* All methods which are ending with "finisher" will be called - e.g. saveFinisher()
* The method initializeFinisher() will always be called at first
* Every finisher method could have its own initialize method, which will be called before. Like initializeMyFinisher() before myFinisher()
* Classes in extensions (if namespace and filename fits) will be automaticly included from TYPO3 autoloader. If you place a single file in fileadmin, use "require" in TypoScript
