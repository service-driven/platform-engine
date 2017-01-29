<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of planning the execution of an event/task/action/reservation/plan to a future date.
 *
 * @see http://schema.org/PlanAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class PlanAction extends OrganizeAction
{
}
