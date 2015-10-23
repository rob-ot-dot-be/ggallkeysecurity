<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "powermail_mul".
 *
 * Auto generated 02-01-2013 10:49
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'powermail multiple upload',
	'description' => 'Offers mulitple uploads for powermail',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '1.0.3',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Mischa Heissmann',
	'author_email' => 'typo3.2008@heissmann.org',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'powermail' => '1.2.2',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:14:{s:12:"ext_icon.gif";s:4:"6e25";s:17:"ext_localconf.php";s:4:"4a3a";s:14:"ext_tables.php";s:4:"2023";s:13:"locallang.xml";s:4:"5a5f";s:14:"doc/manual.sxw";s:4:"1b45";s:19:"doc/wizard_form.dat";s:4:"fae0";s:20:"doc/wizard_form.html";s:4:"a66b";s:33:"lib/def/def_field_multiupload.xml";s:4:"95e3";s:34:"lib/script/multifile_compressed.js";s:4:"2815";s:33:"pi1/class.tx_powermailmul_pi1.php";s:4:"0257";s:17:"pi1/locallang.xml";s:4:"9d56";s:46:"static/powermail_multiple_upload/constants.txt";s:4:"d41d";s:42:"static/powermail_multiple_upload/setup.txt";s:4:"f0cf";s:41:"template/tx_powermailmul_multiupload.html";s:4:"88cd";}',
);

?>