<?php

namespace Schema\SchemaOrg\Enum;

use Schema\Enum\Enum;


/**
 * The publication format of the book.
 *
 * @see http://schema.org/BookFormatType Documentation on Schema.org
 */
class BookFormatType extends Enum
{
    /**
     * @var string Book format: Ebook
     */
    const E_BOOK = 'http://schema.org/EBook';
    /**
     * @var string Book format: Hardcover
     */
    const HARDCOVER = 'http://schema.org/Hardcover';
    /**
     * @var string Book format: Paperback
     */
    const PAPERBACK = 'http://schema.org/Paperback';
    /**
     * @var string Book format: Audiobook. This is an enumerated value for use with the bookFormat property. There is also a type 'Audiobook' in the bib extension which includes Audiobook specific properties
     */
    const AUDIOBOOK_FORMAT = 'http://schema.org/AudiobookFormat';
}
