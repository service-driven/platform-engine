<?php

namespace Warehouse\Communication\Rest\v1;

use Zend\Http\PhpEnvironment\Request;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class PickingStrategyController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\Communication\Rest\v1
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class PickingStrategyController extends AbstractActionController
{
    public function docAction(Request $request)
    {
        return [
            'annotations' => $this->getFacade()->getAnnotations($request->get('bundle')),
        ];
    }
}
