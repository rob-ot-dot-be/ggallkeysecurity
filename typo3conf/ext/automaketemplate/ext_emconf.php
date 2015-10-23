<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "automaketemplate".
 *
 * Auto generated 23-10-2015 11:46
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Template Auto-parser',
	'description' => 'Reads an HTML file and all sections which has a certain class or id value set are wrapped in corresponding template subparts. Also relative paths to images, stylesheets etc. are corrected.',
	'category' => 'plugin',
	'version' => '0.2.0',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearcacheonload' => 1,
	'author' => 'Kasper SkÃ¥rhÃ¸j, alterNET Internet B.V.',
	'author_email' => 'support@alternet.nl',
	'author_company' => 'Curby Soft Multimedia, alterNET Internet B.V.',
	'constraints' => 
	array (
		'depends' => 
		array (
			'cms' => '',
			'typo3' => '4.3.0-6.2.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

