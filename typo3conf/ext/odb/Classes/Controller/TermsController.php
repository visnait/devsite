<?php
namespace DRAKE\Odb\Controller;

use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Terms controller
 */
class TermsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

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
     * termsRepository
     *
     * @var \DRAKE\Odb\Domain\Repository\TermsRepository
     * @inject
     */
    protected $termsRepository = NULL;

    /**
     * initializeAction
     *
     * @return void
     */
    public function initializeAction() {
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
        $this->termsRepository->setDefaultQuerySettings($querySettings);

        $orderings = [
            'term' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
        ];
        $this->termsRepository->setDefaultOrderings($orderings);
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction() {

        //$terms = $this->termsRepository->findAll();
        $terms = $this->termsRepository->findSome(0,10);


        $this->view->assign('terms', $terms);
    }


   

}
