<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Financial services business.
 *
 * @see http://schema.org/FinancialService Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class FinancialService extends LocalBusiness
{
}
