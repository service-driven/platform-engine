<?php

namespace Warehouse\Strategy;

/**
 * Class ZonePicking
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\Strategy
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 *
 * As the name implies, order pickers are assigned a specific and physically defined zone in the pick area.  The picker
 * assigned to each zone is responsible for picking all of the SKUs that are located in the zone for each order. In the
 * event that an order requires SKUs that are located in multiple zones, then the order is filled after it passes
 * through each zone.  This is typically referred to as "pick and pass" methodology.  Additionally, in zone picking
 * there is only one scheduling period per shift. Therefore, there is a cutoff point for orders to be queued into the
 * order picking process and any order received after that cutoff point will get fulfilled during the next shift.
 */
class ZonePickingStrategy extends AbstractPickingStrategy implements PickingStrategyInterface
{

}
