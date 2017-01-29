<?php

namespace Warehouse\Strategy;

/**
 * Class BatchPicking
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\Strategy
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 *
 * Batch picking is when one picker picks a group, or batch, of orders at the same time, one SKU at a time. This is
 * advantageous when there are multiple orders with the same SKU.  When that occurs, the order picker only needs to
 * travel to the pick location for that specific SKU once, in order to fill the multiple orders.  Therefore, the main
 * advantage to choosing this method is reduced travel time, which increases productivity.  Batch picking is often used
 * when the typical order profile has only a few SKUs (under four) and the SKUs physical dimensions are relatively
 * small. Just as in zone picking, batch picking requires only one order scheduling window per picking shift.
 */
class BatchPickingStrategy extends AbstractPickingStrategy implements PickingStrategyInterface
{

}
