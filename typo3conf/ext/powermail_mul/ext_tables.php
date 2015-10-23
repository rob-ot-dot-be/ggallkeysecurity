<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');
t3lib_extMgm::addStaticFile($_EXTKEY,'static/powermail_multiple_upload/', 'powermail multiple upload');

t3lib_div::loadTCA("tx_powermail_fields");
$TCA["tx_powermail_fields"]["columns"]["formtype"]["config"]["items"][] = array('Multiple upload', 'multiupload');
$TCA["tx_powermail_fields"]["columns"]["flexform"]["config"]["ds"]["multiupload"] = 'FILE:EXT:powermail_mul/lib/def/def_field_multiupload.xml';

?>