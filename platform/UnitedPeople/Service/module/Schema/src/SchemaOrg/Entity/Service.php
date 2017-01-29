<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A service provided by an organization, e.g. delivery service, print services, etc.
 *
 * @see http://schema.org/Service Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class Service extends Intangible
{
}
