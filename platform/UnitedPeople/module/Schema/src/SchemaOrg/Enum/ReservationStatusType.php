<?php

namespace Schema\SchemaOrg\Enum;


use Schema\Enum\Enum;


/**
 * Enumerated status values for Reservation.
 *
 * @see http://schema.org/ReservationStatusType Documentation on Schema.org
 */
class ReservationStatusType extends Enum
{
    /**
     * @var string The status for a previously confirmed reservation that is now cancelled
     */
    const RESERVATION_CANCELLED = 'http://schema.org/ReservationCancelled';
    /**
     * @var string The status of a confirmed reservation
     */
    const RESERVATION_CONFIRMED = 'http://schema.org/ReservationConfirmed';
    /**
     * @var string The status of a reservation on hold pending an update like credit card number or flight changes
     */
    const RESERVATION_HOLD = 'http://schema.org/ReservationHold';
    /**
     * @var string The status of a reservation when a request has been sent, but not confirmed
     */
    const RESERVATION_PENDING = 'http://schema.org/ReservationPending';
}
