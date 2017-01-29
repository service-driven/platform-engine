<?php

namespace OpenArchitecture\Restful\Controller;

use Zend\Db\Adapter\Adapter;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class DatabaseController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\Restful\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class DatabaseController extends AbstractActionController
{
    /** @var Adapter  */
    protected $adapter;

    /**
     * DatabaseController constructor.
     *
     * @param Adapter $adapter
     */
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return array
     */
    public function indexAction()
    {
        $this->adapter->getCurrentSchema();
        $this->adapter->getDriver();
        $this->adapter->getHelpers();
        $this->adapter->getPlatform();
        $this->adapter->getProfiler();
        $this->adapter->getQueryResultSetPrototype();
//        $this->adapter->query();
//        $this->adapter->createStatement();
    }
}