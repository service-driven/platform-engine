<?php

namespace Communication\Plugin\Oms\Condition\Sandbox;

/**
 * Class IsPaymentValidCondition
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Communication\Plugin\Oms\Condition\Sandbox
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class IsPaymentValidCondition
{
    public function check($orderItem)
    {
        return true;
    }
}