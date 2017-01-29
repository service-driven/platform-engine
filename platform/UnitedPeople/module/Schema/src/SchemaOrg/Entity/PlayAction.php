<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of playing/exercising/training/performing for enjoyment, leisure, recreation, Competition or exercise.\\n\\nRelated actions:\\n\\n\* [[ListenAction]]: Unlike ListenAction (which is under ConsumeAction), PlayAction refers to performing for an audience or at an event, rather than consuming music.\\n\* [[WatchAction]]: Unlike WatchAction (which is under ConsumeAction), PlayAction refers to showing/displaying for an audience or at an event, rather than consuming visual content.
 *
 * @see http://schema.org/PlayAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class PlayAction extends Action
{
}
