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
 * Item processing for the 'powermailcustomcss' extension.
 *
 * @author	Andrew Plank <plankmeister_NOSPAM@NOSPAM_yahoo.com>
 */

class tx_powermailcustomcss_itemproc {

	/**
	 * The function hook for processing items in the drop-down in Powermail field record, listing CSS classes/labels.
	 *
	 * @param	array				$params: The current list of items (reference)
	 * @param	t3lib_TCEforms		$pObj: The plugin object
	 * @return	null
	 */
	public function itemsProcFunc(array &$params, t3lib_TCEforms &$pObj) {

		//Get the definitions defined in the EM
		$definitions = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['tx_powermailcustomcss']['definitions'];

		//Parse them.
		$splitDefs = t3lib_div::trimExplode(",", $definitions);
		foreach($splitDefs as $splitDef) {

			$labelOption = t3lib_div::trimExplode(":", $splitDef);
			if(count($labelOption) == 2) {

				$items[] = array($labelOption[0], $labelOption[1]);
			}
		}

		//If we have valid items, "return" them.
		if(count($items)) {

			//Add an empty option
			array_unshift($items, array('', ''));
			$params['items'] = $items;
		}

	}



}


?>
