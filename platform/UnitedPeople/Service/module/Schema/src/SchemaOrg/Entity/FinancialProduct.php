<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A product provided to consumers and businesses by financial institutions such as banks, insurance companies, brokerage firms, consumer finance companies, and investment companies which comprise the financial services industry.
 *
 * @see http://schema.org/FinancialProduct Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class FinancialProduct extends Service
{
}
