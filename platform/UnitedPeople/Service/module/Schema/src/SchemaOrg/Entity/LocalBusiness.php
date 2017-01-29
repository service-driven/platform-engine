<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A particular physical business or branch of an organization. Examples of LocalBusiness include a restaurant, a particular branch of a restaurant chain, a branch of a bank, a medical practice, a club, a bowling alley, etc.
 *
 * @see http://schema.org/LocalBusiness Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class LocalBusiness extends Organization
{
}
