<?php

namespace Networking\Controller;

use Application\Service\RestService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class PersonController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class PersonController extends AbstractActionController
{
    public function indexAction()
    {
        $variables = [
            'header' => 'Vernetzungen / Personen',
            'people' => [

            ],
        ];

        return new ViewModel($variables);
    }
}
