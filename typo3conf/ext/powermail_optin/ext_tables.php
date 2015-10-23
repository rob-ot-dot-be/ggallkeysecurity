<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

/* Dont't enable hash field in backend
$tempColumns = Array (
	"tx_powermailoptin_hash" => Array (		
		"exclude" => 1,		
		"label" => "LLL:EXT:powermail_optin/locallang_db.xml:tx_powermail_mails.tx_powermailoptin_hash",		
		"config" => Array (
			"type" => "input",	
			"size" => "30",
		)
	),
);


\TYPO3\CMS\Core\Utility\GeneralUtility::loadTCA("tx_powermail_mails");
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns("tx_powermail_mails",$tempColumns,1);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes("tx_powermail_mails","tx_powermailoptin_hash;;;;1-1-1");
*/


$tempColumns = Array (
	"tx_powermailoptin_optin" => Array (		
		"exclude" => 1,		
		"label" => "LLL:EXT:powermail_optin/locallang_db.xml:tt_content.tx_powermailoptin_optin",		
		"config" => Array (
			"type" => "check",
		)
	),
);


TYPO3\CMS\Core\Utility\GeneralUtility::loadTCA("tt_content");
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns("tt_content",$tempColumns,1);
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content',
        'tx_powermailoptin_optin',
        'powermail_pi1',
        'after:tx_powermail_multiple'
);
?>