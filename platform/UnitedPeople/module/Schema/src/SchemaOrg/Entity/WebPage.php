<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A web page. Every web page is implicitly assumed to be declared to be of type WebPage, so the various properties about that webpage, such as `breadcrumb` may be used. We recommend explicit declaration if these properties are specified, but if they are found outside of an itemscope, they will be assumed to be about the page.
 *
 * @see http://schema.org/WebPage Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class WebPage extends CreativeWork
{
}
