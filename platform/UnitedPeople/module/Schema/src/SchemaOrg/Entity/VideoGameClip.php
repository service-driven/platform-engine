<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A short segment/part of a video game.
 *
 * @see http://schema.org/VideoGameClip Documentation on Schema.org
 *
 * @ORM\Entity
 */
class VideoGameClip extends Clip
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
