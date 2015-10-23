<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "powermail_optin".
 *
 * Auto generated 23-10-2015 11:47
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Powermail double opt-in for powermail 1, compatible to TYPO3 6.2',
	'description' => 'Double opt-in for powermail forms. Could be used for admin or user check. DB entries are hidden up to this moment, when user clicks a link with a secure hash in a generated mail...',
	'category' => 'misc',
	'version' => '1.2.0',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => false,
	'author' => 'Alex Kellner (in2code), Surena Golijani',
	'author_email' => 'sg@cabag.ch',
	'author_company' => 'cab services ag',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.2.9-6.2.99',
			'powermail' => '*',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

