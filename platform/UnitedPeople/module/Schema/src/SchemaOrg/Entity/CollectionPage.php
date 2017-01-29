<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Web page type: Collection page.
 *
 * @see http://schema.org/CollectionPage Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class CollectionPage extends WebPage
{
}
