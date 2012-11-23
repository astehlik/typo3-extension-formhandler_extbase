<?php
/**
 * Tests the extbase processor
 */
class Tx_FormhandlerExtbase_Tests_Unit_Mvc_ExtbaseProcessorTest extends Tx_Extbase_Tests_Unit_BaseTestCase {

	/**
	 * When content validation is active, an an output is expected we want
	 * even a NULL value to be returned as an empty string
	 *
	 * @test
	 */
	public function contentExpectedReturnsEmptyStringForEmptyContent() {

		$extbaseProcessor = $this->getMockForAbstractClass($this->buildAccessibleProxy('Tx_FormhandlerExtbase_Mvc_ExtbaseProcessor'));
		$extbaseProcessor->setContentValidation(TRUE, TRUE);
		$extbaseProcessor->_set('content', NULL);
		$validatedContent = $extbaseProcessor->_call('getValidatedContent');

		$this->assertInternalType('string', $validatedContent);
		$this->assertEquals('', $validatedContent);
	}

	/**
	 * When content validation is active, an no output is expected we make
	 * sure an exception is thrown
	 *
	 * @test
	 */
	public function contentUnexpectedThrowsExceptionForNonEmptyContent() {

		$this->setExpectedException('RuntimeException');

		$extbaseProcessor = $this->getMockForAbstractClass($this->buildAccessibleProxy('Tx_FormhandlerExtbase_Mvc_ExtbaseProcessor'));
		$extbaseProcessor->setContentValidation(TRUE, FALSE);
		$extbaseProcessor->_set('content', 'Hallo World!');
		$extbaseProcessor->_call('getValidatedContent');
	}

	/**
	 * Make sure the settings passed to the processor ae used for extbase
	 *
	 * @test
	 */
	public function extbaseBootstrapIsCalledWithSettings() {

		$extbaseBootstrapMock = $this->getMock($this->buildAccessibleProxy('Tx_Extbase_Core_Bootstrap'), array('run'));
		$extbaseBootstrapMock->expects($this->at(0))->method('run')->with('', array('testsetting'))->will($this->returnValue('testcontent'));

		$extbaseProcessor = $this->getMock($this->buildAccessibleProxy('Tx_FormhandlerExtbase_Mvc_ExtbaseProcessor'), array('createExtbaseBootstrap'), array(array(), array('testsetting')));
		$extbaseProcessor->expects($this->once())->method('createExtbaseBootstrap')->will($this->returnValue($extbaseBootstrapMock));
		$content = $extbaseProcessor->process();

		$this->assertEquals('testcontent', $content);
	}

	/**
	 * Make sure the gp array passed to the processor is set in the formhandler data
	 * @test
	 */
	public function formhanderDataGetsInitializedWithGp() {

		$testarray = array('test1' => 'testvalue1');

		$extbaseProcessor = $this->getMockForAbstractClass($this->buildAccessibleProxy('Tx_FormhandlerExtbase_Mvc_ExtbaseProcessor'), array($testarray, array()));
		$extbaseProcessor->process();

		$formhandlerData = $extbaseProcessor->_get('formhandlerData');
		$this->assertEquals($testarray, $formhandlerData->getGpOriginal());
	}

}
