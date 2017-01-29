<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A list of items of any sort—for example, Top 10 Movies About Weathermen, or Top 100 Party Songs. Not to be confused with HTML lists, which are often used only for formatting.
 *
 * @see http://schema.org/ItemList Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class ItemList extends Intangible
{
}
