<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A product or service offered by a bank whereby one may deposit, withdraw or transfer money and in some cases be paid interest.
 *
 * @see http://schema.org/BankAccount Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class BankAccount extends FinancialProduct
{
}
