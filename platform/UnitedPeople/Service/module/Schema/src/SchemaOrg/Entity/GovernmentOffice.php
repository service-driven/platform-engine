<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A government office—for example, an IRS or DMV office.
 *
 * @see http://schema.org/GovernmentOffice Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class GovernmentOffice extends LocalBusiness
{
}
