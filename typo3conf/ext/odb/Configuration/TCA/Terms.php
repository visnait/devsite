<?php
if (!defined ('TYPO3_MODE')) {
    die ('Access denied.');
}

$_EXTKEY = basename(str_replace('/Configuration/TCA', '',dirname(__FILE__)));
$_table = 'tx_'.str_replace('_', '', $_EXTKEY).'_domain_model_'.\TYPO3\CMS\Core\Utility\GeneralUtility::camelCaseToLowerCaseUnderscored(basename(__FILE__, '.php'));

$GLOBALS['TCA'][$_table] = [
    'ctrl' => [
        'title'     => 'Terms',
        'label'     => 'term',
        'label_alt' => 'note',
        'label_alt_force' => true,
        'tstamp'    => 'tstamp',
        'crdate'    => 'crdate',
        'cruser_id' => 'cruser_id',
#		'sortby' => 'sorting',
        'default_sortby' => 'ORDER BY uid,',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'typeicon_classes' => [
            'default' => 'apps-clipboard-list'
        ],
        'searchFields' => 'term,description,note',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource,hidden,term,description,note',
    ],
    'types' => [
        '0' => ['showitem' => 'sys_language_uid;;;1-1-1, l10n_parent, l10n_diffsource,hidden;;1,term,description,note'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => $_table,
                'foreign_table_where' => 'AND '.$_table.'.pid=###CURRENT_PID### AND '.$_table.'.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => array(
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            )
        ),
        'hidden' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
            ],
        ],

        'term' => [
            'exclude' => 0,
            'label' => 'Term',
            'config' => [
                'type' => 'input',
                'size' => '70',
                'eval' => 'trim,required',
            ],
        ],
        'description' => [
            'exclude' => 0,
            'label' => 'Description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'eval' => 'trim,required',
            ],
        ],
        'note' => [
            'exclude' => 0,
            'label' => 'Note',
            'config' => [
                'type' => 'input',
                'size' => '255',
                'eval' => 'trim',
            ],
        ],
    ],
];
