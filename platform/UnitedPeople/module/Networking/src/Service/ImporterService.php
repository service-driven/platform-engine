<?php

namespace Networking\Service;

use Application\ServiceManager\ImporterManager;
use Networking\Entity\Contact;


/**
 * Class ImporterService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ImporterService
{
    /** @var ImporterManager */
    protected $importerManager;

    /**
     * ImporterService constructor.
     * @param ImporterManager $importerManager
     */
    public function __construct(ImporterManager $importerManager)
    {
        $this->importerManager = $importerManager;
    }

    public function import()
    {
        $importers = $this->importerManager->findAll();
        foreach ($importers as $importer) {
            $data = $importer->import();

            $contact = new Contact("Tobias");

        }

    }
}
