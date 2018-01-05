<?php
namespace DRAKE\Odb\Controller;

use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Terms controller
 */
class TermsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

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
    public function initializeAction()
    {

        $this->cObj = $this->configurationManager->getContentObject();
        $this->piVars = $this->request->getArguments();
        $this->piVars['page'] = intval($this->piVars['page']);

        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\QuerySettingsInterface');
        $querySettings->setRespectSysLanguage(TRUE);
        $querySettings->setRespectStoragePage(FALSE);

        $this->termsRepository->setDefaultQuerySettings($querySettings);

        $orderings = [
            'uid' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
        ];
        $this->termsRepository->setDefaultOrderings($orderings);
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {

        $newTerms = $this->objectManager->get(\DRAKE\Odb\Domain\Model\Terms::class);
        $this->view->assign('newTerms', $newTerms);
        $this->persistenceManager->persistAll();
        //$terms = $this->termsRepository->findAll();

        $terms = $this->termsRepository->findSome(0, 20);
        $this->view->assign('terms', $terms);
        $this->view->assign('total', $this->termsRepository->countAll());
    }

    /**
     * action add
     *
     * @param \DRAKE\Odb\Domain\Model\Terms $newTerms
     * @return void
     */
    public function addAction(\DRAKE\Odb\Domain\Model\Terms $newTerms)
    {
        $this->termsRepository->add($newTerms);
        $this->redirect('list');
    }


    /**
     * Import Action
     *
     * @return void
     */
    public function importAction()
    {

        $input = (string)$_POST['tx_odb_terms']['description'];
        $outp = [];

        if ($input) {
            $out = explode('<H1>', $input);

            foreach ($out as $item) {
                $bc = explode('</H1>', $item);

                $newTerms = $this->objectManager->get(\DRAKE\Odb\Domain\Model\Terms::class);
                $newTerms->setTerm(trim($bc[0]));
                $cleartext = preg_replace("/<\/?P>/i","" , $bc[1]);
                $newTerms->setDescription(trim($cleartext));
                $this->termsRepository->add($newTerms);

                //echo "<h3>".$bc[0]."</h3>";
                //echo "<p>".$bc[1]."</p>";
                $outp[]=$bc;
            }

           //var_dump($cleartext);
            //die;
            $this->persistenceManager->persistAll();

            $this->redirect('list');
        }

        $this->view->assign('total', $this->termsRepository->countAll());
    }

}