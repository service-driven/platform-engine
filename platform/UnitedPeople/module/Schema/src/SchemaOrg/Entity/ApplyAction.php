<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of registering to an organization/service without the guarantee to receive it.\\n\\nRelated actions:\\n\\n\* [[RegisterAction]]: Unlike RegisterAction, ApplyAction has no guarantees that the application will be accepted.
 *
 * @see http://schema.org/ApplyAction Documentation on Schema.org
 *
 * @ORM\Entity
 */
class ApplyAction extends OrganizeAction
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
