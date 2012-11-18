<?php
/**
 * Created by JetBrains PhpStorm.
 * User: astehlik
 * Date: 18.11.12
 * Time: 10:09
 * To change this template use File | Settings | File Templates.
 */
class Tx_FormhandlerExtbase_Validator_Extbase extends Tx_Formhandler_AbstractValidator {

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
	 * @return bool
	 */
	public function validate(&$errors) {

		$this->formhandlerData = t3lib_div::makeInstance('Tx_FormhandlerExtbase_Mvc_FormhandlerData');
		$this->errors = &$errors;

		$extbaseSettings['settings'] = $this->settings;
		$extbaseSettings['extensionName'] = 'FormhandlerExtbase';
		$extbaseSettings['pluginName'] = 'Validator';

		/**
		 * @var Tx_FormhandlerExtbase_Mvc_ExtbaseProcessor $extbaseProcessor
		 */
		$extbaseProcessor = t3lib_div::makeInstance('Tx_FormhandlerExtbase_Mvc_ExtbaseProcessor', $this->gp, $extbaseSettings);
		$extbaseProcessor->setContentValidation(TRUE, FALSE);
		$extbaseProcessor->process();

		return $this->processErrorResult();
	}

	protected function processErrorResult() {

		$errorResult = $this->formhandlerData->getErrorResult();

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
