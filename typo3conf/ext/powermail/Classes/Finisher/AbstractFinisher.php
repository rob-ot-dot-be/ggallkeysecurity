<?php
namespace In2code\Powermail\Finisher;

use In2code\Powermail\Domain\Model\Mail;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Alex Kellner <alexander.kellner@in2code.de>, in2code.de
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * AbstractFinisher
 *
 * @package powermail
 * @license http://www.gnu.org/licenses/lgpl.html
 * 			GNU Lesser General Public License, version 3 or later
 */
abstract class AbstractFinisher implements FinisherInterface {

	/**
	 * @var Mail
	 */
	protected $mail;

	/**
	 * @var array
	 */
	protected $settings;

	/**
	 * @var array
	 */
	protected $configuration;

	/**
	 * @return Mail
	 */
	public function getMail() {
		return $this->mail;
	}

	/**
	 * @param Mail $mail
	 * @return AbstractFinisher
	 */
	public function setMail($mail) {
		$this->mail = $mail;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getSettings() {
		return $this->settings;
	}

	/**
	 * @param array $settings
	 * @return AbstractFinisher
	 */
	public function setSettings($settings) {
		$this->settings = $settings;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getConfiguration() {
		return $this->configuration;
	}

	/**
	 * @param array $configuration
	 * @return AbstractFinisher
	 */
	public function setConfiguration($configuration) {
		$this->configuration = $configuration;
		return $this;
	}

	/**
	 * @return void
	 */
	public function initializeFinisher() {
	}

	/**
	 * @param Mail $mail
	 * @param array $configuration
	 * @param array $settings
	 */
	public function __construct(Mail $mail, array $configuration, array $settings) {
		$this->setMail($mail);
		$this->setConfiguration($configuration);
		$this->setSettings($settings);
	}
}
