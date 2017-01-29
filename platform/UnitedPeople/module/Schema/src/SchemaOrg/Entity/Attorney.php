<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Professional service: Attorney. \\n\\nThis type is deprecated - [[LegalService]] is more inclusive and less ambiguous.
 *
 * @see http://schema.org/Attorney Documentation on Schema.org
 *
 * @ORM\Entity
 */
class Attorney extends LegalService
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
