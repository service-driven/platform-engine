<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of expressing a preference from a set of options or a large or unbounded set of choices/options.
 *
 * @see http://schema.org/ChooseAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class ChooseAction extends AssessAction
{
}
