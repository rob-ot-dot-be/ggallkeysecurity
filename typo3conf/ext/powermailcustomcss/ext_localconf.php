<?php

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['tx_powermailcustomcss'] = unserialize($_EXTCONF);


//Add the hook to manipulate the marker array
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['powermail']['PM_FieldWrapMarkerArrayHook'][] = 'EXT:powermailcustomcss/class.tx_powermailcustomcss_hooks.php:tx_powermailcustomcss_hooks';



?>