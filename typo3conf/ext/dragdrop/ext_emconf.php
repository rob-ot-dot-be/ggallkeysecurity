<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "dragdrop".
 *
 * Auto generated 21-05-2015 14:33
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Drag & drop for content elements',
	'description' => 'Lets you drag and drop content elements in the backend page view (even across several columns).',
	'category' => 'Backend',
	'shy' => 0,
	'version' => '0.4.0',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Armin Ruediger Vieweg',
	'author_email' => 'armin@v.ieweg.de',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5.0-0.0.0',
		),
		'conflicts' => array(
			'templavoila' => '0.0.0-0.0.0',
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:9:{s:12:"ext_icon.gif";s:4:"269d";s:17:"ext_localconf.php";s:4:"105a";s:14:"ext_tables.php";s:4:"0643";s:14:"ext_tables.sql";s:4:"d41d";s:29:"Classes/class.tx_dragdrop.php";s:4:"9fe2";s:41:"Classes/XClass/class.ux_tx_cms_layout.php";s:4:"5070";s:33:"Resources/Public/CSS/dragdrop.css";s:4:"0af6";s:36:"Resources/Public/Images/drophere.gif";s:4:"a613";s:39:"Resources/Public/JavaScript/dragdrop.js";s:4:"7003";}',
);

?>