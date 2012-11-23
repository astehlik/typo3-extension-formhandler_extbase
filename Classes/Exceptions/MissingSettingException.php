<?php

/*                                                                        *
 * This script belongs to the TYPO3 extension "formhandler_subscription". *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * This exception is used when a required setting is missing
 */
class Tx_FormhandlerExtbase_Exceptions_MissingSettingException extends Tx_FormhandlerSubscription_Exceptions_AbstractException {

	/**
	 * The name of the missing setting
	 *
	 * @var string
	 */
	protected $missingSetting;

	/**
	 * Optional description of the missing setting
	 *
	 * @var string
	 */
	protected $missingSettingDescription;

	/**
	 * Creates a new missing setting exception
	 *
	 * @param string $missingSetting The name of the missing setting
	 * @param string $missingSettingDescription An optional description for the missing setting
	 */
	public function __construct($missingSetting, $missingSettingDescription = '') {
		$this->missingSetting = $missingSetting;
		$message = 'A required setting is missing: ' . $missingSetting;
		$message .= strlen($missingSettingDescription) ? ' - ' . $missingSettingDescription : '';
		parent::__construct($message);
	}

	/**
	 * Returns the name of the missing setting
	 *
	 * @return string
	 */
	public function getMissingSetting() {
		return $this->missingSetting;
	}

	/**
	 * Returns the optional description of the missing setting
	 *
	 * @return string
	 */
	public function getMissingSettingDescription() {
		return $this->missingSettingDescription;
	}

}
