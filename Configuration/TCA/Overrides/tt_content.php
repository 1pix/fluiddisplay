<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

// Add a wizard for adding a fluiddisplay
$addTemplateDisplayWizard = array(
	'type' => 'script',
	'title' => 'LLL:EXT:fluiddisplay/Resources/Private/Language/locallang_db.xlf:wizards.add_fluiddisplay',
	'script' => 'wizard_add.php',
	'module' => array(
		'name' => 'wizard_add'
	),
	'icon' => 'EXT:fluiddisplay/Resources/Public/Icons/AddFluidDisplayWizard.png',
	'params' => array(
		'table' => 'tx_fluiddisplay_displays',
		'pid' => '###CURRENT_PID###',
		'setValue' => 'set'
	)
);
$GLOBALS['TCA']['tt_content']['columns']['tx_displaycontroller_consumer']['config']['wizards']['add_fluiddisplay'] = $addTemplateDisplayWizard;

// Register fluiddisplay with the Display Controller as a Data Consumer
$GLOBALS['TCA']['tt_content']['columns']['tx_displaycontroller_consumer']['config']['allowed'] .= ',tx_fluiddisplay_displays';
