<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;
use Schema\SchemaOrg\Enum\DeliveryMethod;

/**
 * A private parcel service as the delivery mode available for a certain offer.\\n\\nCommonly used values:\\n\\n\* http://purl.org/goodrelations/v1#DHL\\n\* http://purl.org/goodrelations/v1#FederalExpress\\n\* http://purl.org/goodrelations/v1#UPS.
 *
 * @see http://schema.org/ParcelService Documentation on Schema.org
 *
 * @ORM\Entity
 */
class ParcelService extends DeliveryMethod
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
