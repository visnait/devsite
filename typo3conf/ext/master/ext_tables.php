<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Resources/Private/Typoscript/', 'Master template');


/* fluidpage template */
\FluidTYPO3\Flux\Core::registerProviderExtensionKey($_EXTKEY, 'Page');

/* fluid content */
\FluidTYPO3\Flux\Core::registerProviderExtensionKey($_EXTKEY, 'Content');



?>