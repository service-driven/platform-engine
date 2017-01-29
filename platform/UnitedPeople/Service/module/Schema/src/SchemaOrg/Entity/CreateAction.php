<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of deliberately creating/producing/generating/building a result out of the agent.
 *
 * @see http://schema.org/CreateAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class CreateAction extends Action
{
}
