<?php
namespace DRAKE\Odb\Controller;

use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Odb controller
 */
class OdbController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    /**
     * piVars
     */
    protected $piVars;

    /**
     * cObj
     *
     * @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer
     */
    protected $cObj = NULL;

    /**
     * odbRepository
     *
     * @var \DRAKE\Odb\Domain\Repository\OdbRepository
     * @inject
     */
    protected $odbRepository = NULL;

    /**
     * initializeAction
     *
     * @return void
     */
    public function initializeAction() {
        #ini_set("memory_limit",-1);
        if (GeneralUtility::_GP('ceuid')) {
            $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'tt_content', 'uid = '.intval(GeneralUtility::_GP('ceuid')));
            if ($res) {
                $row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);
                $GLOBALS['TYPO3_DB']->sql_free_result($res);
                if ($row['uid']) {
                    $cObj = $this->configurationManager->getContentObject();
                    $cObj->start($row);
                    $this->configurationManager->setContentObject($cObj);
                    $flexFormService = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Service\\FlexFormService');
                    $flexFormConfiguration = $flexFormService->convertFlexFormContentToArray($row['pi_flexform']);
                    if($flexFormConfiguration['settings']) {
                        ArrayUtility::mergeRecursiveWithOverrule($this->settings, $flexFormConfiguration['settings']);
                    }
                }
            }
        }
        $this->cObj = $this->configurationManager->getContentObject();
        $this->piVars = $this->request->getArguments();
        $this->piVars['page'] = intval($this->piVars['page']);

        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\QuerySettingsInterface');
        $querySettings->setRespectSysLanguage(FALSE);
        $querySettings->setRespectStoragePage(TRUE);
        if (!$this->cObj || !$this->cObj->data || !$this->cObj->data['pages']) {
            $querySettings->setRespectStoragePage(FALSE);
        }
        $this->odbRepository->setDefaultQuerySettings($querySettings);

        $orderings = [
            'code' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
        ];
        $this->odbRepository->setDefaultOrderings($orderings);
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction() {

       // $this->odbRepository->update();

        $codes = $this->odbRepository->findAll();


        $this->view->assign('codes', $codes);
    }

}
