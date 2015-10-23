<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Andrew Plank <plankmeister_NOSPAM@NOSPAM_yahoo.com>
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
/**
 * Hook for the 'powermailcustomcss' extension.
 *
 * @author	Andrew Plank <plankmeister_NOSPAM@NOSPAM_yahoo.com>
 */

class tx_powermailcustomcss_hooks {


	/**
	 * Manipulates the passed $markerArray array.
	 *
	 * @param	int			$uid: The UID of the current field record.
	 * @param	string		$xml: The XML for the field
	 * @param	string		$type: The type of field
	 * @param	string		$title: The title of the field
	 * @param	array		$markerArray: The markerArray for the field
	 * @param	array		$piVarsFromSession: piVars from the sesssion
	 * @param	object		$obj: The calling object
	 * @return	null
	 */
	function PM_FieldWrapMarkerArrayHook($uid, $xml, $type, $title, &$markerArray, $piVarsFromSession, $obj) {

		//It's a real shame that the query used to get the field in this hook's calling function is so customised... It would be great to have pased the $row to this
		//hook, so that this following DB call could be omitted.
		$record = t3lib_BEfunc::getRecord("tx_powermail_fields", $uid);

		//Tack the custom field on to the end of the ALTERNATE marker. Nice this gets called after doing all the native processing, otherwise this wouldn't be possible!
		$markerArray['###ALTERNATE###'] .= " {$record['tx_powermailcustomcss_customcss']}";

	}

	//As above... there's a difference in the API in different versions of Powermail! Most frustrating!
	function PM_FieldWrapMarkerHook($uid, $xml, $type, $title, &$markerArray, $piVarsFromSession, $obj) {
        $this->PM_FieldWrapMarkerArrayHook($uid, $xml, $type, $title, $markerArray, $piVarsFromSession, $obj);
    }

}


?>
