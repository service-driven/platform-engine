<?php

namespace Networking\Service;

use Application\ServiceManager\ExporterManager;
use Application\ServiceManager\ImporterManager;
use Networking\Importer\Xing\XingCompanyImporter;
use Networking\Importer\Xing\XingImporter;
use Networking\Importer\Xing\XingEventImportService;
use Networking\Importer\Xing\XingFeedImportService;
use Networking\Importer\Xing\XingGroupImportService;
use Networking\Importer\Xing\XingJobImportService;
use Networking\Importer\Xing\XingMessageImportService;
use Networking\Importer\Xing\XingNewsImportService;
use Networking\Importer\Xing\XingRecommendationImportService;
use Networking\Importer\Xing\XingUserImportService;


/**
 * Class ExporterService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ExporterService
{
    /** @var ExporterManager */
    protected $exporterManager;

    /**
     * ExporterService constructor.
     *
     * @param ExporterManager $exporterManager
     */
    public function __construct(ExporterManager $exporterManager)
    {
        $this->exporterManager = $exporterManager;
    }

    public function export()
    {
    }
}
