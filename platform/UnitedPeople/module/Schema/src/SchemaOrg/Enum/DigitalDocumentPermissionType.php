<?php

namespace Schema\SchemaOrg\Enum;


use Schema\Enum\Enum;

/**
 * A type of permission which can be granted for accessing a digital document.
 *
 * @see http://schema.org/DigitalDocumentPermissionType Documentation on Schema.org
 */
class DigitalDocumentPermissionType extends Enum
{
    /**
     * @var string Permission to add comments to the document
     */
    const COMMENT_PERMISSION = 'http://schema.org/CommentPermission';
    /**
     * @var string Permission to read or view the document
     */
    const READ_PERMISSION = 'http://schema.org/ReadPermission';
    /**
     * @var string Permission to write or edit the document
     */
    const WRITE_PERMISSION = 'http://schema.org/WritePermission';
}
