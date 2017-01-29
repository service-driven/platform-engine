<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A comment on an item - for example, a comment on a blog post. The comment's content is expressed via the [[text]] property, and its topic via [[about]], properties shared with all CreativeWorks.
 *
 * @see http://schema.org/Comment Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class Comment extends CreativeWork
{
}
