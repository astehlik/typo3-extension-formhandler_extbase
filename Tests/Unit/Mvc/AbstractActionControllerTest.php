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
 * Tests the abstract formhanlder extbase action controller
 */
class Tx_FormhandlerExtbase_Tests_Unit_Mvc_ActionControllerTest extends Tx_Extbase_Tests_Unit_BaseTestCase {

	/**
	 * Make sure that if disableViewResolution() is called resolveView() returns NULL
	 *
	 * @test
	 */
	public function disabledViewReturnsNullOnViewResolution() {
		$mockController = $this->getViewResolvingControllerMock();
		$mockController->_call('disableViewResolution');
		$view = $mockController->_call('resolveView');
		$this->assertNull($view);
	}

	/**
	 * Make sure that if disableViewResolution() is NOT called resolveView() returns a view
	 *
	 * @test
	 */
	public function enabledViewReturnsViewOnViewResolution() {
		$mockController = $this->getViewResolvingControllerMock();
		$this->assertInstanceOf('Tx_Extbase_MVC_View_ViewInterface', $mockController->_call('resolveView'));
	}

	/**
	 * Initializes all required mocks so that the controller returns a view when resolveView() is called
	 *
	 * @see Tx_Extbase_Tests_Unit_MVC_Controller_ActionControllerTest::resolveViewUsesFluidTemplateViewIfTemplateIsAvailable()
	 * @return PHPUnit_Framework_MockObject_MockObject
	 */
	protected function getViewResolvingControllerMock() {

		$mockSession = $this->getMock('Tx_Extbase_Session_SessionInterface');
		$mockControllerContext = $this->getMock('Tx_Extbase_MVC_Controller_ControllerContext', array(), array(), '', FALSE);
		$mockFluidTemplateView = $this->getMock('Tx_Extbase_MVC_View_ViewInterface');

		$mockObjectManager = $this->getMock('Tx_Extbase_Object_ObjectManagerInterface', array(), array(), '', FALSE);
		$mockObjectManager->expects($this->any())->method('create')->will($this->returnValue($mockFluidTemplateView));

		$mockController = $this->getMock($this->buildAccessibleProxy('Tx_FormhandlerExtbase_Mvc_AbstractActionController'), array('resolveViewObjectName', 'setViewConfiguration'), array(), '', FALSE);
		$mockController->_set('session', $mockSession);
		$mockController->_set('objectManager', $mockObjectManager);
		$mockController->_set('controllerContext', $mockControllerContext);

		return $mockController;
	}

}
