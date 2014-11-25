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
 * Contains actions that will be called by the demo forms of formhandler_extbase
 */
class Tx_FormhandlerExtbase_Controller_ValidationController extends Tx_FormhandlerExtbase_Controller_AbstractActionController {

	/**
	 * @var Tx_Formhandler_UtilityFuncs
	 */
	protected $formhandlerUtils;

	/**
	 * Disables the view
	 */
	protected function initializeAction() {
		$this->formhandlerUtils = Tx_Formhandler_UtilityFuncs::getInstance();
		$this->disableViewResolution();
	}

	/**
	 * Executes the configured extbase validator
	 */
	public function validateAction() {

		$value = $this->formhandlerUtils->getSingle($this->settings, 'value');

		$validatorOptions = array();
		if (is_array($this->settings['validatorOptions.'])) {
			$validatorOptions = $this->settings['validatorOptions.'];
		}

		/** @var Tx_Extbase_Validation_Validator_IntegerValidator $validator */
		$validator = $this->validatorResolver->createValidator($this->settings['validator'], $validatorOptions);
		/** @var Tx_Extbase_Error_Result $result */
		$result = $validator->validate($value);

		$this->formhandlerData->setErrorResult($result);
	}
}