<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

$formhanderExtbaseLoaddemoPlugins = FALSE;

if (isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY])) {
	$formhanderExtbaseExtconf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);
	$formhanderExtbaseLoaddemoPlugins = $formhanderExtbaseExtconf['loadDemoPlugins'];
}

if ($formhanderExtbaseLoaddemoPlugins) {

	Tx_Extbase_Utility_Extension::configurePlugin(
		$_EXTKEY,
		'DemoFinisher',
		array('Demo' => 'finisher'),
		array('Demo' => 'finisher')
	);

	Tx_Extbase_Utility_Extension::configurePlugin(
		$_EXTKEY,
		'DemoFinisherReturn',
		array('Demo' => 'finisherReturn'),
		array('Demo' => 'finisherReturn')
	);

	Tx_Extbase_Utility_Extension::configurePlugin(
		$_EXTKEY,
		'DemoInterceptorInit',
		array('Demo' => 'interceptorInit'),
		array('Demo' => 'interceptorInit')
	);

	Tx_Extbase_Utility_Extension::configurePlugin(
		$_EXTKEY,
		'DemoInterceptorInitReturn',
		array('Demo' => 'interceptorInitReturn'),
		array('Demo' => 'interceptorInitReturn')
	);

	Tx_Extbase_Utility_Extension::configurePlugin(
		$_EXTKEY,
		'DemoInterceptorSave',
		array('Demo' => 'interceptorSave'),
		array('Demo' => 'interceptorSave')
	);

	Tx_Extbase_Utility_Extension::configurePlugin(
		$_EXTKEY,
		'DemoInterceptorSaveReturn',
		array('Demo' => 'interceptorSaveReturn'),
		array('Demo' => 'interceptorSaveReturn')
	);

	Tx_Extbase_Utility_Extension::configurePlugin(
		$_EXTKEY,
		'DemoPreProcessor',
		array('Demo' => 'preProcessor'),
		array('Demo' => 'preProcessor')
	);

	Tx_Extbase_Utility_Extension::configurePlugin(
		$_EXTKEY,
		'DemoPreProcessorReturn',
		array('Demo' => 'preProcessorReturn'),
		array('Demo' => 'preProcessorReturn')
	);
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Validator',
	array('Validation' => 'validate'),
	array('Validation' => 'validate')
);

?>
