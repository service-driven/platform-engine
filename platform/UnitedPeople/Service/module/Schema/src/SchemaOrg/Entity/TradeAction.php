<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of participating in an exchange of goods and services for monetary compensation. An agent trades an object, product or service with a participant in exchange for a one time or periodic payment.
 *
 * @see http://schema.org/TradeAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class TradeAction extends Action
{
}
