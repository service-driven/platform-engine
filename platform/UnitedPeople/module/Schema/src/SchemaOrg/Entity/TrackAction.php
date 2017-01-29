<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * An agent tracks an object for updates.\\n\\nRelated actions:\\n\\n\* [[FollowAction]]: Unlike FollowAction, TrackAction refers to the interest on the location of innanimates objects.\\n\* [[SubscribeAction]]: Unlike SubscribeAction, TrackAction refers to the interest on the location of innanimate objects.
 *
 * @see http://schema.org/TrackAction Documentation on Schema.org
 *
 * @ORM\Entity
 */
class TrackAction extends FindAction
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
