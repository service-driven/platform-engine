<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of gaining ownership of an object from an origin. Reciprocal of GiveAction.\\n\\nRelated actions:\\n\\n\* [[GiveAction]]: The reciprocal of TakeAction.\\n\* [[ReceiveAction]]: Unlike ReceiveAction, TakeAction implies that ownership has been transfered.
 *
 * @see http://schema.org/TakeAction Documentation on Schema.org
 *
 * @ORM\Entity
 */
class TakeAction extends TransferAction
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
