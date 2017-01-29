<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * An agent leaves an event / group with participants/friends at a location.\\n\\nRelated actions:\\n\\n\* [[JoinAction]]: The antonym of LeaveAction.\\n\* [[UnRegisterAction]]: Unlike UnRegisterAction, LeaveAction implies leaving a group/team of people rather than a service.
 *
 * @see http://schema.org/LeaveAction Documentation on Schema.org
 *
 * @ORM\Entity
 */
class LeaveAction extends InteractAction
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
