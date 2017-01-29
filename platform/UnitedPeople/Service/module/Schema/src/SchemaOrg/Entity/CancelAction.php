<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of asserting that a future event/action is no longer going to happen.\\n\\nRelated actions:\\n\\n\* [[ConfirmAction]]: The antonym of CancelAction.
 *
 * @see http://schema.org/CancelAction Documentation on Schema.org
 *
 * @ORM\Entity
 */
class CancelAction extends PlanAction
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
