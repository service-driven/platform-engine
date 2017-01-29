<?php

namespace Networking\Controller;

use Networking\Service\ExporterService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class ExporterController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ExporterController extends AbstractActionController
{
    /** @var ExporterService */
    protected $exporterService;

    /**
     * ExporterController constructor.
     * @param ExporterService $exporterService
     */
    public function __construct(ExporterService $exporterService)
    {
        $this->exporterService = $exporterService;
    }

    public function indexAction()
    {
        return new ViewModel();
    }

    public function exportAction()
    {
        $this->exporterService->export();

        return new ViewModel();
    }
}
