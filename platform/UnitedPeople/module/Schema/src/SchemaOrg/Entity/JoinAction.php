<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * An agent joins an event/group with participants/friends at a location.\\n\\nRelated actions:\\n\\n\* [[RegisterAction]]: Unlike RegisterAction, JoinAction refers to joining a group/team of people.\\n\* [[SubscribeAction]]: Unlike SubscribeAction, JoinAction does not imply that you'll be receiving updates.\\n\* [[FollowAction]]: Unlike FollowAction, JoinAction does not imply that you'll be polling for updates.
 *
 * @see http://schema.org/JoinAction Documentation on Schema.org
 *
 * @ORM\Entity
 */
class JoinAction extends InteractAction
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
