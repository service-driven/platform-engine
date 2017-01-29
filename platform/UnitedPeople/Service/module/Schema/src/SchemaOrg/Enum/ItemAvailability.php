<?php

namespace Schema\SchemaOrg\Enum;

use Schema\Enum\Enum;


/**
 * A list of possible product availability options.
 *
 * @see http://schema.org/ItemAvailability Documentation on Schema.org
 */
class ItemAvailability extends Enum
{
    /**
     * @var string Indicates that the item has been discontinued
     */
    const DISCONTINUED = 'http://schema.org/Discontinued';
    /**
     * @var string Indicates that the item is in stock
     */
    const IN_STOCK = 'http://schema.org/InStock';
    /**
     * @var string Indicates that the item is available only at physical locations
     */
    const IN_STORE_ONLY = 'http://schema.org/InStoreOnly';
    /**
     * @var string Indicates that the item has limited availability
     */
    const LIMITED_AVAILABILITY = 'http://schema.org/LimitedAvailability';
    /**
     * @var string Indicates that the item is available only online
     */
    const ONLINE_ONLY = 'http://schema.org/OnlineOnly';
    /**
     * @var string Indicates that the item is out of stock
     */
    const OUT_OF_STOCK = 'http://schema.org/OutOfStock';
    /**
     * @var string Indicates that the item is available for pre-order, but will be delivered when generally available
     */
    const PRE_ORDER = 'http://schema.org/PreOrder';
    /**
     * @var string Indicates that the item is available for ordering and delivery before general availability
     */
    const PRE_SALE = 'http://schema.org/PreSale';
    /**
     * @var string Indicates that the item has sold out
     */
    const SOLD_OUT = 'http://schema.org/SoldOut';
}
