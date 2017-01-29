<?php

namespace Schema\SchemaOrg\Enum;


use Schema\Enum\Enum;


/**
 * RsvpResponseType is an enumeration type whose instances represent responding to an RSVP request.
 *
 * @see http://schema.org/RsvpResponseType Documentation on Schema.org
 */
class RsvpResponseType extends Enum
{
    /**
     * @var string The invitee will attend
     */
    const RSVP_RESPONSE_YES = 'http://schema.org/RsvpResponseYes';
    /**
     * @var string The invitee will not attend
     */
    const RSVP_RESPONSE_NO = 'http://schema.org/RsvpResponseNo';
    /**
     * @var string The invitee may or may not attend
     */
    const RSVP_RESPONSE_MAYBE = 'http://schema.org/RsvpResponseMaybe';
}
