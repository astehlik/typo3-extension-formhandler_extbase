<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('formhandler_extbase', 'Configuration/TypoScriptDemo/', 'Formhandler Extbase demo forms');