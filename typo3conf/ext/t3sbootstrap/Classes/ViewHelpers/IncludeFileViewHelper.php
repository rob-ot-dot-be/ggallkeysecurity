<?php
namespace T3SBS\T3sbootstrap\ViewHelpers;

/***************************************************************
*  Copyright notice
*
*  (c) 2015 Helmut Hackbarth <typo3@t3solution.de>
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
 * ViewHelper to include a css or js files
 *
 * @package TYPO3
 * @subpackage T3S\T3sbootstrap\
 */
class IncludeFileViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * Include a CSS/JS files
	 *
	 * @param string $path Path to the CSS/JS file which should be included
	 *
	 * @return void
	 */
	public function render( $path ) {

		$path = $GLOBALS['TSFE']->tmpl->getFileName( $path );

		// JS
		if ( strtolower( substr( $path, -3 ) ) === '.js' ) {
			if (\TYPO3\CMS\Core\Utility\GeneralUtility::compat_version('7.4')) {
				/* @var $pageRenderer \TYPO3\CMS\Core\Page\PageRenderer */
				$pageRenderer = $this->objectManager->get('TYPO3\\CMS\\Core\\Page\\PageRenderer');
				$pageRenderer->addJsFile( $path, NULL, FALSE );
			} else {
				$GLOBALS['TSFE']->getPageRenderer()->addJsFile( $path, NULL, FALSE );
			}
		// CSS
		} elseif ( strtolower(substr( $path, -4 ) ) === '.css' ) {
			if (\TYPO3\CMS\Core\Utility\GeneralUtility::compat_version('7.4')) {
				/* @var $pageRenderer \TYPO3\CMS\Core\Page\PageRenderer */
				$pageRenderer = $this->objectManager->get('TYPO3\\CMS\\Core\\Page\\PageRenderer');
				$pageRenderer->addCssFile( $path, 'stylesheet', 'screen', '', FALSE );
			} else {
				$GLOBALS['TSFE']->getPageRenderer()->addCssFile( $path, 'stylesheet', 'screen', '', FALSE );
			}
		}
	}
}
