<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
	'ctrl' => array(
		'title' => 'LLL:EXT:fluiddisplay/Resources/Private/Language/locallang_db.xml:tx_fluiddisplay_displays',
		'label' => 'title',
		'descriptionColumn' => 'description',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY title',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'searchFields' => 'title,description,template',
		'typeicon_classes' => array(
			'default' => 'tx_fluiddisplay-display'
		),
	),
	'interface' => array(
		'showRecordFieldList' => 'hidden,title,description'
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fluiddisplay/Resources/Private/Language/locallang_db.xml:tx_fluiddisplay_displays.title',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'required,trim',
			)
		),
		'description' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fluiddisplay/Resources/Private/Language/locallang_db.xml:tx_fluiddisplay_displays.description',
			'config' => array(
				'type' => 'text',
				'cols' => '40',
				'rows' => '4',
			)
		),
		'template' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fluiddisplay/Resources/Private/Language/locallang_db.xml:tx_fluiddisplay_displays.template',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'required,trim',
				'default' => 'EXT:fluiddisplay/Samples/sampleTemplate.html',
				'wizards' => array(
					'_PADDING' => 2,
					'link' => array(
						'type' => 'popup',
						'title' => 'Link',
						'icon' => 'link_popup.gif',
						'module' => array(
							'name' => 'wizard_element_browser',
							'urlParameters' => array(
								'mode' => 'wizard'
							)
						),
						'JSopenParams' => 'height=600,width=700,status=0,menubar=0,scrollbars=1',
						'params' => array(
							'blindLinkOptions' => 'page,url,mail,spec,folder',
							'allowedExtensions' => $GLOBALS['TYPO3_CONF_VARS']['SYS']['textfile_ext'],
						),
					)
				)
			)
		),
	),
	'types' => array(
		'0' => array('showitem' => 'hidden, title;;1, template')
	),
	'palettes' => array(
		'1' => array('showitem' => 'description')
	)
);
