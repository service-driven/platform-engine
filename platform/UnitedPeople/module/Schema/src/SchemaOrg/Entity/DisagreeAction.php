<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of expressing a difference of opinion with the object. An agent disagrees to/about an object (a proposition, topic or theme) with participants.
 *
 * @see http://schema.org/DisagreeAction Documentation on Schema.org
 *
 * @ORM\Entity
 */
class DisagreeAction extends ReactAction
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
