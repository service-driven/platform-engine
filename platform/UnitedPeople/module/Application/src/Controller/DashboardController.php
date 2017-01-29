<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class DashboardController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Application\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class DashboardController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}
