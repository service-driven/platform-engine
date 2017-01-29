<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of forming one's opinion, reaction or sentiment.
 *
 * @see http://schema.org/AssessAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class AssessAction extends Action
{
}
