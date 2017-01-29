<?php

namespace Warehouse\PickingStrategyManager\PickingStrategy;

/**
 * Class ZoneBatchWavePicking
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\PickingStrategyManager\PickingStrategy
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 *
 * This is the most complex combination of all of the order picking methodologies.  In this method, each picker is
 * assigned a zone and picks all SKUs for orders stocked in the assigned zone.  Additionally, the picker picks more
 * than one SKU at a time and there are multiple scheduling windows per shift.
 */
class ZoneBatchWavePickingStrategy extends AbstractPickingStrategy implements PickingStrategyInterface
{

}