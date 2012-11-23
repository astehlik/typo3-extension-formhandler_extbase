<?php

/**
 * Will only return true if the value matches the configured number
 */
class Tx_FormhandlerExtbase_Demo_RequiredNumberValidator extends Tx_Extbase_Validation_Validator_AbstractValidator {

	/**
	 * Check if $value is valid. If it is not valid, needs to add an error
	 * to Result.
	 *
	 * @param mixed $value The value that should be validated
	 * @throws Tx_FormhandlerExtbase_Exceptions_MissingSettingException If the required number was not set in the options
	 * @return void
	 */
	protected function isValid($value) {

		if (!array_key_exists('requiredNumber', $this->options)) {
			throw new Tx_FormhandlerExtbase_Exceptions_MissingSettingException('requiredNumber', 'The number that the user needs to enter');
		}

		if (intval($value) !== intval($this->options['requiredNumber'])) {
			$this->addError('The value is not ' . $this->options['requiredNumber'], 1353680088);
		}
	}
}
