<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of expressing a negative sentiment about the object. An agent dislikes an object (a proposition, topic or theme) with participants.
 *
 * @see http://schema.org/DislikeAction Documentation on Schema.org
 *
 * @ORM\Entity
 */
class DislikeAction extends ReactAction
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
