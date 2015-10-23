<?php

if ($_SERVER['HTTP_HOST'] == 'local.all-key-security.be') {
	$GLOBALS['TYPO3_CONF_VARS']['DB']['database'] = 'aksDev';
	$GLOBALS['TYPO3_CONF_VARS']['DB']['host']     = 'localhost';
	$GLOBALS['TYPO3_CONF_VARS']['DB']['username'] = 'root';
	$GLOBALS['TYPO3_CONF_VARS']['DB']['password'] = 'root';
}


@include(PATH_typo3conf.'urltoolconf_realurl.php'); // RealUrl-Configuration inserted by extension dix_urltool
?>
