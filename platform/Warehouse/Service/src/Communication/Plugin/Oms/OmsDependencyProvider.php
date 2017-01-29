<?php

namespace Communication\Plugin\Oms;

use Communication\Plugin\Oms\Condition\Sandbox\IsPaymentValidCondition;
use Warehouse\Communication\Plugin\Oms\Condition\ConditionCollection;

/**
 * Class OmsDependencyProvider
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Communication\Plugin\Oms
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class OmsDependencyProvider
{
    /**
     * @param Container $container
     *
     * @return ConditionCollection
     */
    protected function getConditionPlugins(Container $container)
    {
        $collection = parent::getConditionPlugins($container);

        $collection->add(new IsPaymentValidCondition(), 'isPaymentValid');

        return $collection;
    }

    /**
     * @param Container $container
     *
     * @return CommandCollection
     */
    protected function getCommandPlugins(Container $container)
    {
        $collection = parent::getCommandPlugins($container);

        $collection->add(new PayCommand(), 'Demo/Pay');

        return $collection;
    }
}