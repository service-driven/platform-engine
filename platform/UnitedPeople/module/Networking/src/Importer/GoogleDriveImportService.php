<?php

namespace Networking\Importer;

use Networking\Service\GooglePeopleService;

/**
 * Class GoogleDriveImportService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Importer
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class GoogleDriveImportService
{
    /** @var GooglePeopleService */
    protected $peopleService;

    /**
     * PeopleImportService constructor.
     * @param GooglePeopleService $peopleService
     */
    public function __construct(GooglePeopleService $peopleService)
    {
        $this->peopleService = $peopleService;
    }

    public function import()
    {
    }
}
