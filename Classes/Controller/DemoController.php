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
class Tx_FormhandlerExtbase_Controller_DemoController extends Tx_FormhandlerExtbase_Mvc_ActionController {

	public function initializeFinisherAction() {
		$this->disableViewResolution();
	}

	public function finisherAction() {
		$this->formhandlerData->setGpValue('set_by_demo_finisher', 'This value was set by the demo finisher.');
	}

	public function finisherReturnAction() {
		$this->view->assign('testvalue', 'This value was set by the demo controller');
	}

	public function initializeInterceptorInitAction() {
		$this->disableViewResolution();
	}

	public function interceptorInitAction() {
		$this->formhandlerData->setGpValue('set_by_demo_interceptor_init', 'This value was set by the demo init interceptor.');
	}

	public function interceptorInitReturnAction() {
		$this->view->assign('testvalue', 'This value was set by the demo init interceptor.');
	}

	public function initializeInterceptorSaveAction() {
		$this->disableViewResolution();
	}

	public function interceptorSaveAction() {
		$this->formhandlerData->setGpValue('set_by_demo_interceptor_save', 'This value was set by the demo save interceptor.');
	}

	public function interceptorSaveReturnAction() {
		$this->view->assign('testvalue', 'This value was set by the demo save interceptor.');
	}

	public function initializePreProcessorAction() {
		$this->disableViewResolution();
	}

	public function preProcessorAction() {
		$this->formhandlerData->setGpValue('set_by_demo_preprocessor', 'This value was set by the demo pre-processor.');
	}

	public function preProcessorReturnAction() {
		$this->view->assign('testvalue', 'This value was set by the demo pre-processor.');
	}
}

?>