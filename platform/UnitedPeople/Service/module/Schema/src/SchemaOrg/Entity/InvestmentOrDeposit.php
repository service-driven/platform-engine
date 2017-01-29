<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A type of financial product that typically requires the client to transfer funds to a financial service in return for potential beneficial financial return.
 *
 * @see http://schema.org/InvestmentOrDeposit Documentation on Schema.org
 *
 * @ORM\Entity
 */
class InvestmentOrDeposit extends FinancialProduct
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Sets id.
     *
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
