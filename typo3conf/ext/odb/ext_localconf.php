<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'DRAKE.'.$_EXTKEY,
    'Odb',
    [
        'Odb' => 'list,add',
    ],
    [
        'Odb' => 'list,add',
    ]
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'DRAKE.'.$_EXTKEY,
    'Terms',
    [
        'Terms' => 'list',
    ],
    [
        'Terms' => 'list',
    ]
);

