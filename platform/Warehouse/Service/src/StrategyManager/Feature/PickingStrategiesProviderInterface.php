<?php

namespace Warehouse\StrategyManager\Feature;

/**
 * Interface PickingStrategiesProviderInterface
 *
 * PHP Version 7
 *
 * @category  PHP
 * @package   Warehouse\StrategyManager\Feature
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
interface PickingStrategiesProviderInterface
{
    /**
     * @return array
     */
    public function getPickingStrategies() : array;
}
