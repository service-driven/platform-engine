<?php

namespace OpenArchitecture\RestfulMvc\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

/**
 * Class IndexController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulMvc\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new JsonModel(
            array(
                'foo' => 'Bar'
            )
        );
    }
}