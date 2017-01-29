<?php

namespace ServiceDriven\RestfulArchitecture\Service;

use Channel;
use Message;
use Subscription;
use Topic;

/**
 * Class PublishSubscribePattern
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   ServiceDriven\RestfulArchitecture\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class PublishSubscribePattern
{
    /** @var  Channel[] */
    protected $channels;

    /** @var Topic[] */
    protected $topics;

    /** @var Message[] */
    protected $messages;

    /** @var Subscription[] */
    protected $subscriptions;

}