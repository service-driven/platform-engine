<?php

namespace Warehouse\Strategy;

/**
 * Class DiscreteOrderPicking
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\Strategy
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 *
 * This is the most common type of order picking because it is basic and simple to understand. When employing a
 * discrete order picking methodology, one order-picker picks one order, one line at a time.  Additionally, there is
 * only one order scheduling window during a shift. Therefore, orders are not scheduled and may be picked at any time
 * on a particular day. The advantage of using this method of order picking is that it is simple, ideal for paper based
 * picking, provides fast response time for order fulfillment and can easily track order picker accuracy.  On the
 * downside, this is the least efficient methodology as it requires a significant amount of travel time compared to
 * other methods.
 */
class DiscreteOrderPickingStrategy extends AbstractPickingStrategy implements PickingStrategyInterface
{

}
