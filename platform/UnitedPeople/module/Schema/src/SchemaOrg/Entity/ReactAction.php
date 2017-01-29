<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of responding instinctively and emotionally to an object, expressing a sentiment.
 *
 * @see http://schema.org/ReactAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class ReactAction extends AssessAction
{
}
