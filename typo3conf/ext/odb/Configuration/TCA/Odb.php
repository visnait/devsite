<?php
if (!defined ('TYPO3_MODE')) {
    die ('Access denied.');
}

$_EXTKEY = basename(str_replace('/Configuration/TCA', '',dirname(__FILE__)));
$_table = 'tx_'.str_replace('_', '', $_EXTKEY).'_domain_model_'.\TYPO3\CMS\Core\Utility\GeneralUtility::camelCaseToLowerCaseUnderscored(basename(__FILE__, '.php'));

$GLOBALS['TCA'][$_table] = [
    'ctrl' => [
        'title'     => 'LLL:EXT:'.$_EXTKEY.'/Resources/Private/Language/locallang_db.xlf:'.$_table,
        'label'     => 'code',
        'label_alt' => 'note',
        'label_alt_force' => true,
        'tstamp'    => 'tstamp',
        'crdate'    => 'crdate',
        'cruser_id' => 'cruser_id',
#		'sortby' => 'sorting',
        'default_sortby' => 'ORDER BY code,',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'typeicon_classes' => [
            'default' => 'apps-clipboard-list'
        ],
        'searchFields' => 'code,description,note',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource,hidden,code,description,note',
    ],
    'types' => [
        '0' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource,hidden,code,description,note'],
    ],
    'columns' => [
        'sys_language_uid' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => array(
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
                ),
            ),
        ),
        'l10n_parent' => array(
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l10n_parent',
            'config' => array(
                'type' => 'select',
                'items' => array(
                    array('', 0),
                ),
                'foreign_table' => 'tx_odb_domain_model_odb',
                'foreign_table_where' => 'AND tx_odb_domain_model_odb.pid=###CURRENT_PID### AND tx_odb_domain_model_odb.sys_language_uid IN (-1,0)',
            ),
        ),
        'l10n_diffsource' => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),

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

        'code' => [
            'exclude' => 0,
            'label' => 'CODE',
            'config' => [
                'type' => 'input',
                'size' => '5',
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
