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
class Tx_FormhandlerExtbase_Controller_DemoController extends Tx_FormhandlerExtbase_Controller_AbstractActionController {

	/**
	 * Disables the view for the non returning finisher action
	 */
	public function initializeFinisherAction() {
		$this->disableViewResolution();
	}

	/**
	 * Non returning finisher action that updates a gp value
	 */
	public function finisherAction() {
		$this->formhandlerData->setGpValue('set_by_demo_finisher', 'This value was set by the demo finisher.');
	}

	/**
	 * Returning finisher action that renderes a template
	 */
	public function finisherReturnAction() {
		$this->view->assign('testvalue', 'This value was set by the demo controller');
	}

	/**
	 * Disables the view for the non returning init interceptor action
	 */
	public function initializeInterceptorInitAction() {
		$this->disableViewResolution();
	}

	/**
	 * Non returning init interceptor action that updates a gp value
	 */
	public function interceptorInitAction() {
		$this->formhandlerData->setGpValue('set_by_demo_interceptor_init', 'This value was set by the demo init interceptor.');
	}

	/**
	 * Returning init interceptor action that renderes a template
	 */
	public function interceptorInitReturnAction() {
		$this->view->assign('testvalue', 'This value was set by the demo init interceptor.');
	}

	/**
	 * Disables the view for the non returning save interceptor action
	 */
	public function initializeInterceptorSaveAction() {
		$this->disableViewResolution();
	}

	/**
	 * Non returning save interceptor action that updates a gp value
	 */
	public function interceptorSaveAction() {
		$this->formhandlerData->setGpValue('set_by_demo_interceptor_save', 'This value was set by the demo save interceptor.');
	}

	/**
	 * Returning save interceptor action that renderes a template
	 */
	public function interceptorSaveReturnAction() {
		$this->view->assign('testvalue', 'This value was set by the demo save interceptor.');
	}

	/**
	 * Disables the view for the non returning preprocessor action
	 */
	public function initializePreProcessorAction() {
		$this->disableViewResolution();
	}

	/**
	 * Non returning preprocessor action that updates a gp value
	 */
	public function preProcessorAction() {
		$this->formhandlerData->setGpValue('set_by_demo_preprocessor', 'This value was set by the demo pre-processor.');
	}

	/**
	 * Returning preprocessor action that renderes a template
	 */
	public function preProcessorReturnAction() {
		$this->view->assign('testvalue', 'This value was set by the demo pre-processor.');
	}
}

?>