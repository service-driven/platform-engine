<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of accomplishing something via previous efforts. It is an instantaneous action rather than an ongoing process.
 *
 * @see http://schema.org/AchieveAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class AchieveAction extends Action
{
}
