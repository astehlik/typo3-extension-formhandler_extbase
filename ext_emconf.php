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
	'version' => '0.1.1',
	'dependencies' => 'formhandler,extbase',
	'state' => 'beta',
	'author' => 'Alexander Stehlik',
	'author_email' => 'alexander.stehlik.deleteme@googlemail.com',
	'author_company' => '',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5.0-6.2.99',
			'extbase' => '0.0.0-0.0.0',
			'formhandler' => '0.0.0-0.0.0',
		),
		'conflicts' => array(),
		'suggests' => array(),
	),
	'_md5_values_when_last_written' => '',
);