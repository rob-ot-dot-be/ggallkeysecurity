<?php

if ($_SERVER['HTTP_HOST'] == 'local.all-key-security.be') {
	$GLOBALS['TYPO3_CONF_VARS']['DB']['database'] = 'aksDev';
	$GLOBALS['TYPO3_CONF_VARS']['DB']['host']     = 'localhost';
	$GLOBALS['TYPO3_CONF_VARS']['DB']['username'] = 'root';
	$GLOBALS['TYPO3_CONF_VARS']['DB']['password'] = 'root';
}

