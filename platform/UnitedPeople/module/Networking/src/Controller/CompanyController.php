<?php

namespace Networking\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class CompanyController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class CompanyController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }
}
