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
class Tx_FormhandlerExtbase_Controller_ValidationController extends Tx_FormhandlerExtbase_Mvc_ActionController {

	protected function initializeAction() {
		$this->disableViewResolution();
	}

	public function validateAction() {

		$value = $this->formhandlerData->getGpValue($this->settings['field']);

		$validatorOptions = array();
		if (is_array($this->settings['validatorOptions.'])) {
			$validatorOptions = $this->settings['validatorOptions.'];
		}

		$validator = $this->validatorResolver->createValidator($this->settings['validator'], $validatorOptions);
		$result = $validator->validate($value);

		$this->formhandlerData->setErrorResult($result);
	}
}

?>