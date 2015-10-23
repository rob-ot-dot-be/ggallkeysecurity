<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2008 Mischa Heiﬂmann <typo3.2008@heissmann.org>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

require_once(PATH_tslib.'class.tslib_pibase.php');
require_once(t3lib_extMgm::extPath('powermail').'lib/class.tx_powermail_sessions.php'); // load session class


/**
 * Plugin 'powermail multiple upload' for the 'powermail_mul' extension.
 *
 * @author	Mischa Heiﬂmann <typo3.2008@heissmann.org>
 * @package	TYPO3
 * @subpackage	tx_powermailmul
 */
class tx_powermailmul_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_powermailmul_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_powermailmul_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'powermail_mul';	// The extension key.
	var $pi_checkCHash = true;

	function PM_FieldHook($xml, $title, $type, $uid, $markerArray, $piVarsFromSession, $obj) {
		$this->conf = $conf;
		$this->content = $content;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
		
		// config
		$this->xml = $xml;
		$this->uid = $uid;
		$this->obj = $obj;
		$this->piVarsFromSession = $piVarsFromSession;
		$content = ''; $content_item = ''; $this->tmpl = array();
		
		// let's go
		if($type == 'multiupload') {
			$this->tmpl['multi'] = tslib_cObj::fileResource('EXT:powermail_mul/template/tx_powermailmul_multiupload.html');
			
			if (count($piVarsFromSession['FILE']) > 0) { // if there are already files in the session
				if (count($piVarsFromSession['FILE']) != $this->pi_getFFvalue(t3lib_div::xml2array($xml),'amount')) { // max. allowed files still not reached
					$content .= $this->showFields($markerArray, ($this->pi_getFFvalue(t3lib_div::xml2array($this->xml),'amount') - count($piVarsFromSession['FILE'])) ); // show fields
				}
				$content .= $this->showFiles($markerArray); // show uploaded files
			} else { // there are no files in the session, show field
				$content .= $this->showFields($markerArray, $this->pi_getFFvalue(t3lib_div::xml2array($this->xml),'amount')); // show fields
			}
			
			if (!empty($content)) return $content;

		}
	}
	
	
	// Function showFiles() to show uploaded files
	function showFiles($markerArray) {
		// Show allways uploaded files with possibility to delete
		$this->tmpl['html_multi']['all'] = tslib_cObj::getSubpart($this->tmpl['multi'],'###POWERMAIL_FIELDWRAP_HTML_MULTIUPLOAD_LIST###'); // work on subpart 1
		$this->tmpl['html_multi']['item'] = tslib_cObj::getSubpart($this->tmpl['html_multi']['all'],'###ITEM###'); // work on subpart 2
		
		if (count($this->piVarsFromSession['FILE']) > 0) { // if there are values
			foreach ($this->piVarsFromSession['FILE'] as $key => $value) { // one loop for every existing file in the session
				$markerArray['###FILE###'] = $value;
				$markerArray['###DELETEFILE_URL###'] = $this->obj->pi_linkTP_keepPIvars_url(array('clearSession' => array($key => $this->uid)));
				$markerArray['###DELETEFILE###'] = t3lib_extMgm::siteRelPath('powermail').'img/icon_del.gif';
				$content_item .= $this->obj->cObj->substituteMarkerArrayCached($this->tmpl['html_multi']['item'], $markerArray);
			}
		}
		$subpartArray['###CONTENT###'] = $content_item; // subpart 3
		$this->markerArray['###POWERMAIL_FIELD_UID###'] = $this->uid;
		
		$content .= $this->obj->cObj->substituteMarkerArrayCached($this->tmpl['html_multi']['all'], $this->markerArray, $subpartArray); // substitute Marker in Template
		$content = preg_replace("|###.*?###|i", "", $content); // Finally clear not filled markers
		
		if (!empty($content)) return $content;
	}
	
	
	// Function showFields() to show upload field
	function showFields($markerArray, $noOfFiles) {
		$this->tmpl['html_multi']['fields'] = tslib_cObj::getSubpart($this->tmpl['multi'],'###POWERMAIL_FIELDWRAP_HTML_MULTIUPLOAD###'); // work on subpart
				
		$markerArray['###UID###'] = $this->uid; // Field uid
		$markerArray['###AMOUNT###'] = $noOfFiles; // Number of allowed files for upload
		$markerArray['###START###'] = count($this->piVarsFromSession['FILE']); // Start with Number X
		$markerArray['###LABEL_AMOUNT###'] = sprintf($this->pi_getLL('tx_powermail_mul.multiupload.amount.label', 'You can upload up to %s files.'), $noOfFiles); // Label for allowed files
		$markerArray['###LABEL_DELETE###'] = $this->pi_getLL('tx_powermail_mul.multiupload.delete.label', 'Delete'); // Label to deleted files
		if (count($this->piVarsFromSession['FILE']) > 0) $markerArray['###CLASS###'] = str_replace('required ', '', $markerArray['###CLASS###']);

		$content = tslib_cObj::substituteMarkerArrayCached($this->tmpl['html_multi']['fields'], $markerArray); // substitute Marker in Template
		$content = preg_replace("|###.*?###|i", "", $content); // Finally clear not filled markers
		
		if (!empty($content)) return $content;
	}
	
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/powermail_mul/pi1/class.tx_powermailmul_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/powermail_mul/pi1/class.tx_powermailmul_pi1.php']);
}

?>