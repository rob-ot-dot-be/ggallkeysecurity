<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

t3lib_extMgm::addPItoST43($_EXTKEY,'pi1/class.tx_powermailmul_pi1.php','_pi1','',1);

// Hook for using the plugin with powermail (Formwrap)
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['powermail']['PM_FieldHook']['multiupload'][] = 'EXT:powermail_mul/pi1/class.tx_powermailmul_pi1.php:tx_powermailmul_pi1';

?>