<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A payment method using a credit, debit, store or other card to associate the payment with an account.
 *
 * @see http://schema.org/PaymentCard Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class PaymentCard extends FinancialProduct
{
}
