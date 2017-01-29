<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of posing a question / favor to someone.\\n\\nRelated actions:\\n\\n\* [[ReplyAction]]: Appears generally as a response to AskAction.
 *
 * @see http://schema.org/AskAction Documentation on Schema.org
 *
 * @ORM\Entity
 */
class AskAction extends CommunicateAction
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
