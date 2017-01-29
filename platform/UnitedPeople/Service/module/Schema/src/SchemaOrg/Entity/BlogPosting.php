<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A blog post.
 *
 * @see http://schema.org/BlogPosting Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class BlogPosting extends SocialMediaPosting
{
}
