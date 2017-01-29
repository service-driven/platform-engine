<?php

namespace Warehouse\Oms;

/**
 * Class OmsConfig
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\Oms
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class OmsConfig
{
    const ORDER_PROCESS_PREPAYMENT = 'Prepayment';

    /**
     * @return string
     */
    public function getProcessDefinitionLocation()
    {
        return __DIR__ . '/../../data/oms/';
    }

    /**
     * @return array
     */
    public function getActiveProcesses()
    {
        return [
            //..
            static::ORDER_PROCESS_PREPAYMENT,
        ];
    }
}