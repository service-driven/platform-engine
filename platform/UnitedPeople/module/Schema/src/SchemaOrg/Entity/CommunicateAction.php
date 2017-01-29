<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of conveying information to another person via a communication medium (instrument) such as speech, email, or telephone conversation.
 *
 * @see http://schema.org/CommunicateAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class CommunicateAction extends InteractAction
{
}
