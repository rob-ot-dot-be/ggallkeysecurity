<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$tempColumns = array (
	'tx_powermailcustomcss_customcss' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:powermailcustomcss/locallang_db.xml:tx_powermail_fields.tx_powermailcustomcss_customcss',		
		'config' => array (
			'type' => 'input',	
			'size' => '30',
		)
	),
);


if($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['tx_powermailcustomcss']['mode'] == 'options') {

	include_once(t3lib_extMgm::extPath('powermailcustomcss') . 'class.tx_powermailcustomcss_itemproc.php');

	$tempColumns['tx_powermailcustomcss_customcss']['config'] = array(
			'type' => 'select',
			'items' => Array (
				Array('No definitions',''),
			),
			'allowNonIdValues' => 1,
			'itemsProcFunc' => 'tx_powermailcustomcss_itemproc->itemsProcFunc',
			'size' => 1,
			'minitems' => 0,
			'maxitems' => 1,
			'selicon_cols' => 10,
	);
}


t3lib_div::loadTCA('tx_powermail_fields');
t3lib_extMgm::addTCAcolumns('tx_powermail_fields',$tempColumns,1);
$TCA['tx_powermail_fields']['palettes']['2']['showitem'] .= ', tx_powermailcustomcss_customcss';

?>