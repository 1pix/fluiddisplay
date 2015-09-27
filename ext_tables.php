<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_fluiddisplay_displays');

// Add context sensitive help (csh) for this table
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'tx_fluiddisplay_displays',
	'EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_csh_txfluiddisplaydisplays.xml'
);

// Register sprite icon for fluiddisplay table
$extensionRelativePath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY);
$icon = array(
	'display' => $extensionRelativePath . 'Resources/Public/Icons/FluidDisplay.png'
);
\TYPO3\CMS\Backend\Sprite\SpriteManager::addSingleIcons(
	$icon,
	$_EXTKEY
);

// Add a wizard for adding a fluiddisplay
$addTemplateDisplayWizard = array(
	'type' => 'script',
	'title' => 'LLL:EXT:fluiddisplay/Resources/Private/Language/locallang_db.xml:wizards.add_fluiddisplay',
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
