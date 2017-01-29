<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of committing to/adopting an object.\\n\\nRelated actions:\\n\\n\* [[RejectAction]]: The antonym of AcceptAction.
 *
 * @see http://schema.org/AcceptAction Documentation on Schema.org
 *
 * @ORM\Entity
 */
class AcceptAction extends AllocateAction
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
