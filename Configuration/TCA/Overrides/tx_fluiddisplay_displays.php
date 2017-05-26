<?php
// Change wizard information for TYPO3 v8
if (\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_version) >= 8000000) {
    unset($GLOBALS['TCA']['tx_fluiddisplay_displays']['columns']['template']['config']['wizards']);
    $GLOBALS['TCA']['tx_fluiddisplay_displays']['columns']['template']['config']['renderType'] = 'inputLink';
    $GLOBALS['TCA']['tx_fluiddisplay_displays']['columns']['template']['config']['fieldControl'] = [
                        'linkPopup' => [
                            'options' => [
                                'title' => 'LLL:EXT:fluiddisplay/Resources/Private/Language/locallang_db.xlf:tx_fluiddisplay_displays.template.popup',
                                'blindLinkOptions' => 'mail, page, spec, url, folder',
                                'blindLinkFields' => 'class, params, target, title',
                                'allowedExtensions' => $GLOBALS['TYPO3_CONF_VARS']['SYS']['textfile_ext']
                            ],
                        ],
                    ];
    $GLOBALS['TCA']['tx_fluiddisplay_displays']['columns']['template']['config']['softref'] = 'typolink';
}