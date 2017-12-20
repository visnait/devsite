<?php
namespace DRAKE\Odb\Utility;

use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * Add extension to the wizard in page module
 *
 * @package DRAKE
 * @subpackage Odb
 */
class WizardIcon {

    const _EXT_KEY = 'odb';
    var $plugins = [
        'Odb',
        'Terms',
    ];

    /**
     * Processing the wizard items array
     *
     * @param array $wizardItems The wizard items
     * @return Modified array with wizard items
     */
    public function proc($wizardItems) {
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        foreach ($this->plugins as $plugin) {
            $plugin = strtolower($plugin);
            $pluginName = str_replace('_', '', self::_EXT_KEY).'_'.$plugin;
            $iconIdentifier = 'ext-'.self::_EXT_KEY.'-'.$plugin.'_wiz-icon';
            $iconRegistry->registerIcon(
                $iconIdentifier,
                \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                ['source' => 'EXT:'.self::_EXT_KEY.'/Resources/Public/Icons/'.$plugin.'_wiz.svg']
            );
            $wizardItems['plugins_tx_'.$pluginName] = [
                'iconIdentifier' => $iconIdentifier,
                'title' => $GLOBALS['LANG']->sL('LLL:EXT:'.self::_EXT_KEY.'/Resources/Private/Language/locallang_be.xlf:'.$plugin.'_title'),
                'description' => $GLOBALS['LANG']->sL('LLL:EXT:'.self::_EXT_KEY.'/Resources/Private/Language/locallang_be.xlf:'.$plugin.'_plus_wiz_description'),
                'tt_content_defValues.' => ['CType' => 'list', 'list_type' => $pluginName]
            ];
        }
        return $wizardItems;
    }
}
?>