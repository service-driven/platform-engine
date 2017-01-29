<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A part of a successively published publication such as a periodical or multi-volume work, often numbered. It may represent a time span, such as a year.
 *
 * See also [blog post](http://blog.schema.org/2014/09/schemaorg-support-for-bibliographic_2.html).
 *
 * @see http://schema.org/PublicationVolume Documentation on Schema.org
 *
 * @ORM\Entity
 */
class PublicationVolume extends CreativeWork
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
