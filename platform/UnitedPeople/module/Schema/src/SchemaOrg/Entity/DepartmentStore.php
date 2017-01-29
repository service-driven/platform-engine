<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A department store.
 *
 * @see http://schema.org/DepartmentStore Documentation on Schema.org
 *
 * @ORM\Entity
 */
class DepartmentStore extends Store
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
