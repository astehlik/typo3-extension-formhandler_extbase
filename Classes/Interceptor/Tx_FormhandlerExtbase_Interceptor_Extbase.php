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
 * This interceptor calls an extbase plugin
 */
class Tx_FormhandlerExtbase_Interceptor_Extbase extends Tx_Formhandler_AbstractInterceptor {

	/**
	 * Calls the exbase bootstrap
	 */
	public function process() {

		/**
		 * @var Tx_FormhandlerExtbase_Mvc_ExtbaseProcessor $extbaseProcessor
		 */
		$extbaseProcessor = t3lib_div::makeInstance('Tx_FormhandlerExtbase_Mvc_ExtbaseProcessor', $this->gp, $this->settings);
		return $extbaseProcessor->process();
	}
}

?>