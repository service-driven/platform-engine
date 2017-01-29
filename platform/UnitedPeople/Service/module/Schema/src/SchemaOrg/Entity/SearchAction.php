<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of searching for an object.\\n\\nRelated actions:\\n\\n\* [[FindAction]]: SearchAction generally leads to a FindAction, but not necessarily.
 *
 * @see http://schema.org/SearchAction Documentation on Schema.org
 *
 * @ORM\Entity
 */
class SearchAction extends Action
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
