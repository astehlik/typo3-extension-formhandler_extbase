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
 * This finisher calls an extbase plugin
 */
class Tx_FormhandlerExtbase_Formhandler_ExtbaseFinisher extends Tx_Formhandler_AbstractFinisher {

	/**
	 * Calls the exbase bootstrap
	 */
	public function process() {

		$returningContentExpected = (intval($this->utilityFuncs->getSingle($this->settings, 'returns')) === 1);

		/**
		 * @var Tx_FormhandlerExtbase_Mvc_ExtbaseProcessor $extbaseProcessor
		 */
		$extbaseProcessor = t3lib_div::makeInstance('Tx_FormhandlerExtbase_Mvc_ExtbaseProcessor', $this->gp, $this->settings);
		$extbaseProcessor->setContentValidation(TRUE, $returningContentExpected);
		return $extbaseProcessor->process();
	}
}