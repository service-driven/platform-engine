<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * An agent controls a device or application.
 *
 * @see http://schema.org/ControlAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class ControlAction extends Action
{
}
