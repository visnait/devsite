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
     * Persistence Manager
     *
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
     * @inject
     */
    protected $persistenceManager;

    /**
     * initializeAction
     *
     * @return void
     */
    public function initializeAction() {
        
        $this->cObj = $this->configurationManager->getContentObject();
        $this->piVars = $this->request->getArguments();
        $this->piVars['page'] = intval($this->piVars['page']);

        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\QuerySettingsInterface');
        $querySettings->setRespectSysLanguage(TRUE);
        $querySettings->setRespectStoragePage(FALSE);

        $this->odbRepository->setDefaultQuerySettings($querySettings);
        $orderings = [
            'uid' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
        ];
        $this->odbRepository->setDefaultOrderings($orderings);

    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction() {

        $newOdb = $this->objectManager->get(\DRAKE\Odb\Domain\Model\Odb::class);
        $this->view->assign('newOdb', $newOdb);
        $this->persistenceManager->persistAll();

        //$codes = $this->odbRepository->findAll();
        $codes = $this->odbRepository->findSome(0,10);
        $this->view->assign('codes', $codes);

    }


    /**
    * action add
    *
    * @param \DRAKE\Odb\Domain\Model\Odb $newOdb
    * @return void
    */
    public function addAction(\DRAKE\Odb\Domain\Model\Odb $newOdb)
    {
        $this->odbRepository->add($newOdb);
        $this->redirect('list');
    }

}
