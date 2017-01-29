<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A technical article - Example: How-to (task) topics, step-by-step, procedural troubleshooting, specifications, etc.
 *
 * @see http://schema.org/TechArticle Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class TechArticle extends Article
{
}
