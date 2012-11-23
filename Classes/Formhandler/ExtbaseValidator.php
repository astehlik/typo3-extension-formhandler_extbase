<?php

/*                                                                        *
 * This script belongs to the TYPO3 extension "formhandler_extbase".      *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * This formhandler validator uses an extbase validator for validation
 */
class Tx_FormhandlerExtbase_Formhandler_ExtbaseValidator extends Tx_Formhandler_AbstractValidator {

	/**
	 * Reference to the array containing all validation errors, format is
	 * array(
	 *   'fieldname' => array('check_name1', 'check_name2', ...),
	 *   'name' => array('required', 'date'),
	 *   ...
	 * );
	 * @var array
	 */
	protected $errors;

	/**
	 * Object that contains data from the formhandler processing and
	 * will be filled with additional data by the extbase controller
	 *
	 * @var Tx_FormhandlerExtbase_Mvc_FormhandlerData
	 */
	protected $formhandlerData;

	/**
	 * Validates the submitted values using given settings
	 *
	 * @param array $errors Reference to the errors array to store the errors occurred
	 * @throws Tx_FormhandlerExtbase_Exceptions_MissingSettingException If field setting is missing
	 * @return bool
	 */
	public function validate(&$errors) {

		if (!isset($this->settings['field'])) {
			throw new Tx_FormhandlerExtbase_Exceptions_MissingSettingException('field', 'Name of the field to which the validation errors should be appended to');
		}

		$this->initializeValueSettingByFieldName($this->settings['field']);

		$this->formhandlerData = t3lib_div::makeInstance('Tx_FormhandlerExtbase_Mvc_FormhandlerData');
		$this->errors = &$errors;

		$extbaseSettings['settings'] = $this->settings;
		$extbaseSettings['extensionName'] = isset($extbaseSettings['extensionName']) ? $extbaseSettings['extensionName'] : 'FormhandlerExtbase';
		$extbaseSettings['pluginName'] = isset($extbaseSettings['pluginName']) ? $extbaseSettings['pluginName'] : 'Validator';

		/**
		 * @var Tx_FormhandlerExtbase_Mvc_ExtbaseProcessor $extbaseProcessor
		 */
		$extbaseProcessor = t3lib_div::makeInstance('Tx_FormhandlerExtbase_Mvc_ExtbaseProcessor', $this->gp, $extbaseSettings);
		$extbaseProcessor->setContentValidation(TRUE, FALSE);
		$extbaseProcessor->process();

		return $this->processErrorResult();
	}

	/**
	 * When the use did not specify the value that should be validated it
	 * is read from the gp array
	 *
	 * @param string $fieldName Name of the field to which any errors will be appended to
	 */
	protected function initializeValueSettingByFieldName($fieldName) {

		if (!isset($this->settings['value']) && array_key_exists($fieldName, $this->gp)) {
			$this->settings['value'] = $this->gp[$this->settings['field']];
		}
	}

	/**
	 * Checks the error result from the validator and
	 *
	 * @return bool TRUE, if no errors occured
	 * @throws Exception If no error result was initialized in the formhandler data object
	 */
	protected function processErrorResult() {

		$errorResult = $this->formhandlerData->getErrorResult();

		if (!isset($errorResult)) {
			throw new Exception("The error result in the formhandler data object was not set. When you use your own controller please make sure you set the error result.");
		}

		if (!$errorResult->hasErrors()) {
			return TRUE;
		}

		/**
		 * @var Tx_Extbase_Error_Error $error
		 */
		foreach ($errorResult->getErrors() as $error) {
			$this->errors[$this->settings['field']][] = 'extbase_' . $error->getCode();
		}

		return FALSE;
	}
}
