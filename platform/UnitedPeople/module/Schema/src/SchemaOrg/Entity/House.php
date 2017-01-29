<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A house is a building or structure that has the ability to be occupied for habitation by humans or other creatures (Source: Wikipedia, the free encyclopedia, see <http://en.wikipedia.org/wiki/House>).
 *
 * @see http://schema.org/House Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class House extends Accommodation
{
}
