<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");

// Configuration of class ux_parsehtml_proc extending class t3lib_parsehtml_proc



//$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['EXT:'.$_EXTKEY.'/class.dam_browser.php'] = t3lib_extMgm::extPath('tinyrte').'class.dam_browser.php';
//$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['typo3/browser.php'] = t3lib_extMgm::extPath('tinyrte').'class.dam_browser.php';

//$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['EXT:'.$_EXTKEY.'/class.dam_browse_links.php'] = t3lib_extMgm::extPath('tinyrte').'class.dam_browse_links.php';
//$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['typo3/browse_links.php'] = t3lib_extMgm::extPath('tinyrte').'class.dam_browse_links.php';


if(!$TYPO3_CONF_VARS['BE']['RTEenabled'])  $TYPO3_CONF_VARS['BE']['RTEenabled'] = 1;
$TYPO3_CONF_VARS['BE']['RTE_reg'][$_EXTKEY] = array('objRef' => 'EXT:'.$_EXTKEY.'/class.tx_tinyrte_base.php:&tx_tinyrte_base');

//enable Tablehandling
t3lib_extMgm::addPageTSConfig('
RTE.default.proc.preserveTables=1
RTE.default.addParams {
	remove_script_host=false
	relative_urls=false
	theme_advanced_toolbar_location="top"
	theme_advanced_toolbar_align="left"
	theme_advanced_statusbar_location="bottom"
        extended_valid_elements="a[t3page|href|target|onClick|t3url|t3target],form[method|action],input[type|name],select[name],option[value|selected],hr[class|width|size|noshade],help;"
        entity_encoding="raw"
}
');
?>