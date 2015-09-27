<?php
if (!defined ('TYPO3_MODE')) {
 	die ('Access denied.');
}

// Register as Data Consumer service
// Note that the subtype corresponds to the name of the database table
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addService(
	'fluiddisplay',
	// Service type
	'dataconsumer',
	// Service key
	'tx_fluiddisplay_dataconsumer',
	array(
		'title' => 'Fluid-based Data Consumer',
		'description' => 'Data Consumer for recordset-type data structures, based on Fluid templating',

		'subtype' => 'tx_fluiddisplay_displays',

		'available' => TRUE,
		'priority' => 50,
		'quality' => 50,

		'os' => '',
		'exec' => '',

		'className' => 'Tesseract\Fluiddisplay\Component\DataConsumer',
	)
);

