<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of an agent relocating to a place.\\n\\nRelated actions:\\n\\n\* [[TransferAction]]: Unlike TransferAction, the subject of the move is a living Person or Organization rather than an inanimate object.
 *
 * @see http://schema.org/MoveAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class MoveAction extends Action
{
}
