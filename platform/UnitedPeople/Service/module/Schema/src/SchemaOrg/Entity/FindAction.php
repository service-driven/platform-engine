<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TThe act of finding an object.\\n\\nRelated actions:\\n\\n\* [[SearchAction]]: FindAction is generally lead by a SearchAction, but not necessarily.
 *
 * @see http://schema.org/FindAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class FindAction extends Action
{
}
