<?php

namespace Simplicity\ReviewPlatform\Service;

use chobie\Jira\Api;
use chobie\Jira\Api\Authentication\Basic;

/**
 * Class JiraService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\ReviewPlatform\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class JiraService
{
    protected $api;

    /**
     * JiraService constructor.
     */
    public function __construct()
    {
        $this->api = new Api(
            'https://horizon.simplicity.ag/jira',
            new Basic('t.oberrauch@simplicity.ag', "Jiw*CYHL`e7D,c:xr<.!Msb[Sy'4N\n'xHm#gQNkp.'bgbYyXjb}=G.9fP9oj+tm")
        );
    }

    public function findIssue($id)
    {
        $result = $this->api->getIssue($id);

        return $result;
    }
}