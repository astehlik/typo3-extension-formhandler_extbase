<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "formhandler_extbase".
 *
 * Auto generated 23-11-2012 16:28
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Formhandler Extbase',
	'description' => 'Enhances the formhandler extension with the possibility to call Extbase PreProcessors, Finishers etc.',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '0.1.0',
	'dependencies' => 'formhandler,extbase',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Alexander Stehlik',
	'author_email' => 'alexander.stehlik.deleteme@googlemail.com',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'php' => '3.0.0-0.0.0',
			'typo3' => '3.5.0-0.0.0',
			'formhandler' => '0.0.0-0.0.0',
			'extbase' => '0.0.0-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
			'tinyurls' => '0.0.1-0.0.0',
		),
	),
	'_md5_values_when_last_written' => 'a:27:{s:21:"ext_conf_template.txt";s:4:"23c6";s:12:"ext_icon.gif";s:4:"0d47";s:17:"ext_localconf.php";s:4:"053a";s:14:"ext_tables.php";s:4:"68e6";s:47:"Classes/Controller/AbstractActionController.php";s:4:"52bc";s:37:"Classes/Controller/DemoController.php";s:4:"6f0b";s:43:"Classes/Controller/ValidationController.php";s:4:"f312";s:40:"Classes/Demo/RequiredNumberValidator.php";s:4:"cf5e";s:40:"Classes/Exceptions/AbstractException.php";s:4:"52a5";s:46:"Classes/Exceptions/MissingSettingException.php";s:4:"0a06";s:39:"Classes/Formhandler/ExtbaseFinisher.php";s:4:"2908";s:42:"Classes/Formhandler/ExtbaseInterceptor.php";s:4:"1460";s:43:"Classes/Formhandler/ExtbasePreProcessor.php";s:4:"b725";s:40:"Classes/Formhandler/ExtbaseValidator.php";s:4:"8541";s:32:"Classes/Mvc/ExtbaseProcessor.php";s:4:"8afe";s:31:"Classes/Mvc/FormhandlerData.php";s:4:"5059";s:38:"Configuration/TypoScriptDemo/setup.txt";s:4:"5d6a";s:44:"Resources/Private/Forms/Demo/SimpleForm.html";s:4:"2340";s:43:"Resources/Private/Forms/Demo/SimpleForm.xml";s:4:"d0e9";s:52:"Resources/Private/Templates/Demo/FinisherReturn.html";s:4:"8970";s:59:"Resources/Private/Templates/Demo/InterceptorInitReturn.html";s:4:"918d";s:59:"Resources/Private/Templates/Demo/InterceptorSaveReturn.html";s:4:"9773";s:56:"Resources/Private/Templates/Demo/PreProcessorReturn.html";s:4:"6b4c";s:47:"Tests/Unit/Mvc/AbstractActionControllerTest.php";s:4:"6247";s:39:"Tests/Unit/Mvc/ExtbaseProcessorTest.php";s:4:"cbd1";s:14:"doc/manual.pdf";s:4:"bcaf";s:14:"doc/manual.sxw";s:4:"a79c";}',
	'suggests' => array(
	),
);

?>