<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A card payment method of a particular brand or name. Used to mark up a particular payment method and/or the financial product/service that supplies the card account.\\n\\nCommonly used values:\\n\\n\* http://purl.org/goodrelations/v1#AmericanExpress\\n\* http://purl.org/goodrelations/v1#DinersClub\\n\* http://purl.org/goodrelations/v1#Discover\\n\* http://purl.org/goodrelations/v1#JCB\\n\* http://purl.org/goodrelations/v1#MasterCard\\n\* http://purl.org/goodrelations/v1#VISA.
 *
 * @see http://schema.org/CreditCard Documentation on Schema.org
 *
 * @ORM\Entity
 */
class CreditCard extends PaymentCard
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
