<?php

namespace Warehouse\PickingStrategyManager\PickingStrategy;

/**
 * Class ZoneWavePicking
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\PickingStrategyManager\PickingStrategy
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 *
 * This is a combination of methods in that pickers are assigned a zone and each picker within their zone picks all of
 * the SKUs for all orders that are stocked in their zone, one order at a time with one scheduling window per shift.
 */
class ZoneWavePickingStrategy extends AbstractPickingStrategy implements PickingStrategyInterface
{

}