<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'DRAKE.'.$_EXTKEY,
    'Odb',
    [
        'Odb' => 'list',
        'Terms' => 'list',
    ],
    [
        'Odb' => 'list',
        'Terms' => 'list',
    ]
);
