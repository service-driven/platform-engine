<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of responding to a question/message asked/sent by the object. Related to [[AskAction]]\\n\\nRelated actions:\\n\\n\* [[AskAction]]: Appears generally as an origin of a ReplyAction.
 *
 * @see http://schema.org/ReplyAction Documentation on Schema.org
 *
 * @ORM\Entity
 */
class ReplyAction extends CommunicateAction
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
