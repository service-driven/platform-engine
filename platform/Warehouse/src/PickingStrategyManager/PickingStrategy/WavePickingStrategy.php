<?php

namespace Warehouse\PickingStrategyManager\PickingStrategy;

/**
 * Class WavePicking
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\PickingStrategyManager\PickingStrategy
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 *
 * Wave picking is very similar to discrete picking in that one picker picks one order, one SKU at a time.  The main
 * difference is the scheduling window.  In discrete picking, there is not a scheduling window whereas in wave picking
 * there is.  Therefore, orders may be scheduled to be picked at specific times of the day, which is usually done to
 * coordinate and maximize the picking and shipping operations.
 */
class WavePickingStrategy extends AbstractPickingStrategy implements PickingStrategyInterface
{

}