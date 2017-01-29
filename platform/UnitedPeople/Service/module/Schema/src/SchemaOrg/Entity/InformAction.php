<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of notifying someone of information pertinent to them, with no expectation of a response.
 *
 * @see http://schema.org/InformAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class InformAction extends CommunicateAction
{
}
