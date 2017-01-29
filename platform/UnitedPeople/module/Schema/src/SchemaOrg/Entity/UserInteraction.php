<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserInteraction and its subtypes is an old way of talking about users interacting with pages. It is generally better to use [[Action]]-based vocabulary, alongside types such as [[Comment]].
 *
 * @see http://schema.org/UserInteraction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class UserInteraction extends Event
{
}
