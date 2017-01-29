<?php

namespace Warehouse\Strategy;

/**
 * Class ZoneBatchPicking
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\Strategy
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 *
 * This is a combination of methods in that pickers are assigned a zone, just like traditional zone picking, however
 * they are also directed to batch pick within their zone. Since both zone picking and batch picking have a scheduling
 * window, then zone-batch picking does too.
 */
class ZoneBatchPickingStrategy extends AbstractPickingStrategy implements PickingStrategyInterface
{

}
