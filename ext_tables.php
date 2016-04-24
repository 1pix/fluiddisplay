<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_fluiddisplay_displays');

// Add context sensitive help (csh) for this table
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'tx_fluiddisplay_displays',
	'EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_csh_txfluiddisplaydisplays.xlf'
);

// Register sprite icon for fluiddisplay table
/** @var \TYPO3\CMS\Core\Imaging\IconRegistry $iconRegistry */
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
        'tx_fluiddisplay-display',
        \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
        [
            'source' => 'EXT:fluiddisplay/Resources/Public/Icons/FluidDisplay.png'
        ]
);

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
