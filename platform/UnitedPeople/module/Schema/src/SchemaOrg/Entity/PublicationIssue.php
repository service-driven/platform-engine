<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A part of a successively published publication such as a periodical or publication volume, often numbered, usually containing a grouping of works such as articles.\\n\\n[blog post](http://blog.schema.org/2014/09/schemaorg-support-for-bibliographic\_2.html).
 *
 * @see http://schema.org/PublicationIssue Documentation on Schema.org
 *
 * @ORM\Entity
 */
class PublicationIssue extends CreativeWork
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
