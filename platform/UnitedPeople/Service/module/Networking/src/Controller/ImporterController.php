<?php

namespace Networking\Controller;

use Application\ServiceManager\ImporterManager;
use Networking\Importer\ImporterInterface;
use Networking\Importer\XingImporter;
use Networking\Service\ImporterService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class ImporterController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ImporterController extends AbstractActionController
{
    /** @var ImporterManager */
    protected $importerManager;
    /** @var ImporterService */
    protected $importerService;

    /**
     * ImporterController constructor.
     *
     * @param ImporterManager $importerManager
     * @param ImporterService $importerService
     */
    public function __construct(ImporterManager $importerManager, ImporterService $importerService)
    {
        $this->importerManager = $importerManager;
        $this->importerService = $importerService;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        $importers = $this->importerManager->findAll();

        foreach ($importers as $importerId => $importerFactoryClass) {
            /** @var ImporterInterface $importer */
            $importer = $this->importerManager->get($importerId);
            $importer->import();
        }

        return new ViewModel();
    }
}
