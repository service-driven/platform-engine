<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of obtaining an object under an agreement to return it at a later date. Reciprocal of LendAction.\\n\\nRelated actions:\\n\\n\* [[LendAction]]: Reciprocal of BorrowAction.
 *
 * @see http://schema.org/BorrowAction Documentation on Schema.org
 *
 * @ORM\Entity
 */
class BorrowAction extends TransferAction
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
