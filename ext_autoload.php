<?php
/*
 * Register necessary class names with autoloader
 */
$classesPath = t3lib_extMgm::extPath('formhandler_extbase', 'Classes/');
return array(
	'tx_formhandlerextbase_mvc_formhandlerdata' => $classesPath . 'Mvc/FormhandlerData.php',
);

?>