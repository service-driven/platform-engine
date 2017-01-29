<?php

namespace Schema\SchemaOrg\Enum;

use Schema\Enum\Enum;


/**
 * Enumerated for values for itemListOrder for indicating how an ordered ItemList is organized.
 *
 * @see http://schema.org/ItemListOrderType Documentation on Schema.org
 */
class ItemListOrderType extends Enum
{
    /**
     * @var string An ItemList ordered with lower values listed first
     */
    const ITEM_LIST_ORDER_ASCENDING = 'http://schema.org/ItemListOrderAscending';
    /**
     * @var string An ItemList ordered with higher values listed first
     */
    const ITEM_LIST_ORDER_DESCENDING = 'http://schema.org/ItemListOrderDescending';
    /**
     * @var string An ItemList ordered with no explicit order
     */
    const ITEM_LIST_UNORDERED = 'http://schema.org/ItemListUnordered';
}
