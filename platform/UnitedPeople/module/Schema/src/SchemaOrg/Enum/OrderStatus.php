<?php

namespace Schema\SchemaOrg\Enum;


use Schema\Enum\Enum;


/**
 * Enumerated status values for Order.
 *
 * @see http://schema.org/OrderStatus Documentation on Schema.org
 */
class OrderStatus extends Enum
{
    /**
     * @var string OrderStatus representing cancellation of an order
     */
    const ORDER_CANCELLED = 'http://schema.org/OrderCancelled';
    /**
     * @var string OrderStatus representing successful delivery of an order
     */
    const ORDER_DELIVERED = 'http://schema.org/OrderDelivered';
    /**
     * @var string OrderStatus representing that an order is in transit
     */
    const ORDER_IN_TRANSIT = 'http://schema.org/OrderInTransit';
    /**
     * @var string OrderStatus representing that payment is due on an order
     */
    const ORDER_PAYMENT_DUE = 'http://schema.org/OrderPaymentDue';
    /**
     * @var string OrderStatus representing availability of an order for pickup
     */
    const ORDER_PICKUP_AVAILABLE = 'http://schema.org/OrderPickupAvailable';
    /**
     * @var string OrderStatus representing that there is a problem with the order
     */
    const ORDER_PROBLEM = 'http://schema.org/OrderProblem';
    /**
     * @var string OrderStatus representing that an order is being processed
     */
    const ORDER_PROCESSING = 'http://schema.org/OrderProcessing';
    /**
     * @var string OrderStatus representing that an order has been returned
     */
    const ORDER_RETURNED = 'http://schema.org/OrderReturned';
}
