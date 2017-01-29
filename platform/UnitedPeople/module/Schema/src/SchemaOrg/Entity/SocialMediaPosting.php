<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A post to a social media platform, including blog posts, tweets, Facebook posts, etc.
 *
 * @see http://schema.org/SocialMediaPosting Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class SocialMediaPosting extends Article
{
}
