<?php
if (!defined ('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript(
    $_EXTKEY,
    'constants',
    \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl('EXT:' . $_EXTKEY . 'Resources/Private/Typoscript/constants.txt')
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript(
    $_EXTKEY,
    'setup',
    \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl('EXT:' . $_EXTKEY . 'Resources/Private/Typoscript/setup.txt')
);



$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon('iconWell', \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class, ['source' => 'EXT:master/Resources/Public/Images/WizardIcons/iconWell.svg']);



?>