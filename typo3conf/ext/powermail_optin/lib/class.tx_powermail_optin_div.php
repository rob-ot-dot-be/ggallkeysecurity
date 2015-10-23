<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Alex Kellner <alexander.kellner@in2code.de>
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


class tx_powermail_optin_div extends tslib_pibase {

	
	/**
	 * Generates random string
	 *
	 * @param	int		$len: String length
	 * @param	string	$list: Allowed signs
	 * @return	random string
	 */
	function simpleRandString($len = 32, $list = '23456789abcdefghijklmnopqrstufwxyzABCDEFGHJKMNPQRSTUVWXYZ') {
		$randomString = '';
		$listLength = strlen($list) - 1;
		if (is_numeric ($len) && !empty ($list)) {
			for($pos = 0; $pos < $len; $pos++) {
				$randomString .= $list[rand(0, $listLength)];
			}
		}
		return $randomString;
	}

	
	/**
	 * Function updateMailEntry() set mail entry of powermail from hidden=1 to hidden=0
	 *
	 * @param	int		$uid: mail uid to manipulate
	 * @return	void
	 */
	function updateMailEntry($uid) {
		//file_put_contents('/home/www-data/steiner.ch/fileadmin/_temp_/debug-updateMailEntry-'.$_GET['L'].'-'.date("Y-m-d_H-i-s",time()).'.txt', 'div::updateMailEntry('.$uid.')');

		if ($uid > 0) {
			// Update tx_powermail_mails SET hidden = 0
			$GLOBALS['TYPO3_DB']->exec_UPDATEquery (
				'tx_powermail_mails',
				'uid = ' . intval($uid),
				array (
					'tstamp' => time(),
					'hidden' => 0
				)
			);
		}
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/powermail_optin/lib/class.tx_powermail_optin_div.php']) {
	include_once ($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/powermail_optin/lib/class.tx_powermail_optin_div.php']);
}
?>