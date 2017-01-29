<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of notifying someone that a future event/action is going to happen as expected.\\n\\nRelated actions:\\n\\n\* [[CancelAction]]: The antonym of ConfirmAction.
 *
 * @see http://schema.org/ConfirmAction Documentation on Schema.org
 *
 * @ORM\Entity
 */
class ConfirmAction extends InformAction
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
