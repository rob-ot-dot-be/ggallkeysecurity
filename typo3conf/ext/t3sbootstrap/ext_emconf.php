<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "t3sbootstrap".
 *
 * Auto generated 22-10-2015 10:58
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Bootstrap Components',
	'description' => 'Startup extension to use bootstrap 3 classes and components out of the box. Suitable for small projects to save development time. Works with dyncss - Less Parser! Example and info: www.t3sbootstrap.de',
	'category' => 'templates',
	'version' => '2.1.1',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => false,
	'author' => 'Helmut Hackbarth',
	'author_email' => 'typo3@t3solution.de',
	'author_company' => 't3solution',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.2.10-7.4.99',
			'gridelements' => '3.2.0-4.0.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

