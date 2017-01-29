<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A permit issued by an organization, e.g. a parking pass.
 *
 * @see http://schema.org/Permit Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class Permit extends Intangible
{
}
