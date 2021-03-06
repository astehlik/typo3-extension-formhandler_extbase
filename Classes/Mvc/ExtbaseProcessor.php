<?php
/**
 * Handels the bootstrapping of Extbase
 */
class Tx_FormhandlerExtbase_Mvc_ExtbaseProcessor {

	/**
	 * The content generated by the extbase processing
	 *
	 * @var string
	 */
	protected $content;

	/**
	 * Object that contains data from the formhandler processing and
	 * will be filled with additional data by the extbase controller
	 *
	 * @var Tx_FormhandlerExtbase_Mvc_FormhandlerData
	 */
	protected $formhandlerData;

	/**
	 * Formhandler gp array
	 *
	 * @var array
	 */
	protected $gp;

	/**
	 * If this is TRUE the returning content will be checked against the expectation
	 * set in $returningContentExpected
	 *
	 * @var bool
	 */
	public $returningContentCheckEnabled = FALSE;

	/**
	 * If this is TRUE we expect Extbase to return content, otherwise it must not
	 * return content
	 *
	 * @var bool
	 */
	public $returningContentExpected = FALSE;

	/**
	 * Array containing the extbase configuration
	 *
	 * @var array
	 */
	protected $settings = NULL;

	/**
	 * Creates a new extbase processor
	 *
	 * @param array $gp gp array of formhandler
	 * @param array $settings extbase configuration
	 */
	public function __construct($gp, $settings) {
		$this->gp = $gp;
		$this->settings = $settings;
		$this->formhandlerData = t3lib_div::makeInstance('Tx_FormhandlerExtbase_Mvc_FormhandlerData');
	}

	/**
	 * Calls the Extbase bootstrap and returns either the generated content or the
	 * updated gp array for formhandler
	 *
	 * @return array|string
	 */
	public function process() {

		$this->formhandlerData->initialize($this->gp);

		$extbaseBootstrap = $this->createExtbaseBootstrap();
		$this->content = $extbaseBootstrap->run('', $this->settings);

		return $this->getValidatedContent();
	}

	/**
	 * This setter can be used to enable the validation of the returning content.
	 *
	 * @param bool $enableReturningContentCheck Set this to TRUE to enable the validation
	 * @param bool $returningContentExpected Set this to TRUE if you expect Extbase to return content and to FALSE if not
	 */
	public function setContentValidation($enableReturningContentCheck, $returningContentExpected)  {
		$this->returningContentCheckEnabled = $enableReturningContentCheck;
		$this->returningContentExpected = $returningContentExpected;
	}

	/**
	 * Returns an instance of the extbase bootstrapper. Needed for unit testing.
	 *
	 * @return Tx_Extbase_Core_Bootstrap;
	 */
	protected function createExtbaseBootstrap() {
		return t3lib_div::makeInstance('Tx_Extbase_Core_Bootstrap');
	}

	/**
	 * Checks, if the returning content should be checked and if checking was enabled
	 * it makes sure that the Exbase output matches the expectations.
	 *
	 * If Extbase returns content and we didn't expect it an exception is thrown.
	 *
	 * If Extbase does not return content and we did expect it to we simply return an empty string.
	 *
	 * @return array|string The generated Extbase content if not empty or the updated gp array if no content was returned
	 * @throws RuntimeException If no returning content is expected but Extbase returns a non empty string
	 */
	protected function getValidatedContent() {

		if (!empty($this->content)) {

			if ($this->returningContentCheckEnabled && (!$this->returningContentExpected)) {
				throw new RuntimeException("Your finisher was not configured to return content but your controller has not returned an empty value. Please make sure to disable the view in your controller or to set return to 1 in the finisher configuration");
			}

			return $this->content;

		} else {

			if ($this->returningContentCheckEnabled && $this->returningContentExpected) {
				return '';
			}

			return $this->formhandlerData->getGpUpdated();
		}
	}

}
