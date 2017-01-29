<?php

namespace Schema\SchemaOrg\Enum;


use Schema\Enum\Enum;


/**
 * A specific payment status. For example, PaymentDue, PaymentComplete, etc.
 *
 * @see http://schema.org/PaymentStatusType Documentation on Schema.org
 */
class PaymentStatusType extends Enum
{
    /**
     * @var string An automatic payment system is in place and will be used
     */
    const PAYMENT_AUTOMATICALLY_APPLIED = 'http://schema.org/PaymentAutomaticallyApplied';
    /**
     * @var string The payment has been received and processed
     */
    const PAYMENT_COMPLETE = 'http://schema.org/PaymentComplete';
    /**
     * @var string The payee received the payment, but it was declined for some reason
     */
    const PAYMENT_DECLINED = 'http://schema.org/PaymentDeclined';
    /**
     * @var string The payment is due, but still within an acceptable time to be received
     */
    const PAYMENT_DUE = 'http://schema.org/PaymentDue';
    /**
     * @var string The payment is due and considered late
     */
    const PAYMENT_PAST_DUE = 'http://schema.org/PaymentPastDue';
}
