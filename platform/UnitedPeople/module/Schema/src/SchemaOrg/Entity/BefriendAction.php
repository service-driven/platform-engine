<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of forming a personal connection with someone (object) mutually/bidirectionally/symmetrically.\\n\\nRelated actions:\\n\\n\* [[FollowAction]]: Unlike FollowAction, BefriendAction implies that the connection is reciprocal.
 *
 * @see http://schema.org/BefriendAction Documentation on Schema.org
 *
 * @ORM\Entity
 */
class BefriendAction extends InteractAction
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
