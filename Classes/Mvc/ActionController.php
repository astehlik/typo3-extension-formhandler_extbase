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
 * This controller can be used as a base for controllers that should be used
 * together with formhander finishers, pre-processors etc.
 *
 * It provides access to the formhandler data object, that can be used to manipulate
 * the gp array of formhandler.
 */
abstract class Tx_FormhandlerExtbase_Mvc_ActionController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * Set this to TRUE if you do not want a view to be attached to this
	 * controller by default. This can be the case if you only want to update
	 * the gp array of formhandler and you don't want to return (HTML-)content
	 */
	protected $disableViewResolution = FALSE;

	/**
	 * Contains environment information of the current formhandler request
	 *
	 * @var Tx_FormhandlerExtbase_Mvc_FormhandlerData
	 */
	protected $formhandlerData;

	/**
	 * Injects the current formhandler data
	 *
	 * @param Tx_FormhandlerExtbase_Mvc_FormhandlerData $formhandlerData
	 */
	public function injectFormhandlerData(Tx_FormhandlerExtbase_Mvc_FormhandlerData $formhandlerData) {
		$this->formhandlerData = $formhandlerData;
	}

	/**
	 * Disable the view resolution. Call this in the initializeAction() to diable it for
	 * the whole controller or in the initializeYourAction() method to disable it only
	 * for the yourAction() method.
	 */
	protected function disableViewResolution() {
		$this->disableViewResolution = TRUE;
	}

	/**
	 * Returns the default view if disableViewResolution ist set to FALSE, otherwise
	 * it will return NULL and prevent the rendering of any content
	 *
	 * @return Tx_Extbase_MVC_View_ViewInterface
	 */
	protected function resolveView() {

		if ($this->disableViewResolution) {
			return NULL;
		} else {
			return parent::resolveView();
		}
	}

}
