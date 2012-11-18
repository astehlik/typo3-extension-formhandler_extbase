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
 * This singleton is used to pass data to the gp array of formhandler
 */
class Tx_FormhandlerExtbase_Mvc_FormhandlerData implements t3lib_Singleton {

	/**
	 * Contains the error result of a validator
	 *
	 * @var Tx_Extbase_Error_Result
	 */
	protected $errorResult;

	/**
	 * Contains the unchanged gp array of formhandler
	 *
	 * @var array
	 */
	protected $gpOriginal;

	/**
	 * Contains the updated gp array that will be passed to formhandler
	 * @var array
	 */
	protected $gpUpdated;

	/**
	 * Initializes both arrays with the given gp array
	 *
	 * @param $gp
	 */
	public function initialize($gp) {
		$this->errorResult = null;
		$this->gpOriginal = $gp;
		$this->gpUpdated = $gp;
	}

	/**
	 * Returns the errors array
	 *
	 * @return Tx_Extbase_Error_Result
	 */
	public function getErrorResult() {
		return $this->errorResult;
	}

	/**
	 * Returns the original gp array of formhandler
	 *
	 * @return array
	 */
	public function getGpOriginal() {
		return $this->gpOriginal;
	}

	/**
	 * Returns the updated gp array of formhandler
	 *
	 * @return array
	 */
	public function getGpUpdated() {
		return $this->gpUpdated;
	}

	/**
	 * Returns an value from the updated gp array
	 *
	 * @param string $name
	 * @return mixed
	 */
	public function getGpValue($name) {
		return $this->gpUpdated[$name];
	}

	/**
	 * Returns a value from the original gp array
	 *
	 * @param string $name
	 * @return mixed
	 */
	public function getGpValueOriginal($name) {
		return $this->gpOriginal[$name];
	}

	/*
	 * Removes a value from the updated gp array if it exists
	 */
	public function removeGpValue($name) {

		if (array_key_exists($this->gpUpdated, $name)) {
			unset($this->gpUpdated[$name]);
		}
	}

	/**
	 * Sets the error result of a validator
	 *
	 * @param Tx_Extbase_Error_Result $errorResult
	 */
	public function setErrorResult($errorResult) {
		$this->errorResult = $errorResult;
	}

	/**
	 * Overwrites the current gp array with the given value
	 *
	 * @param array $gpUpdated
	 * @throws InvalidArgumentException If the given parameter is not an array
	 */
	public function setGpUpdated($gpUpdated) {

		if (!is_array($gpUpdated)) {
			throw new InvalidArgumentException("The given parameter for the new gp array is not an array.");
		}

		$this->gpUpdated = $gpUpdated;
	}

	/**
	 * Updates an entry in the updated gp array with the given value
	 * @param string $name
	 * @param mixed $value
	 */
	public function setGpValue($name, $value) {
		$this->gpUpdated[$name] = $value;
	}
}
