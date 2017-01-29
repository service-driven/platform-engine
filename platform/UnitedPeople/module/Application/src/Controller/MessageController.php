<?php

namespace Application\Controller;

use RabbitMQ\Consumer\Message;
use RabbitMQ\Consumer\WorkQueueConsumer;
use RabbitMQ\Job\Job;
use RabbitMQ\Publisher\WorkQueuePublisher;
use RabbitMQ\Service\RabbitMQ;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class MessageController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Application\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class MessageController extends AbstractActionController
{
    /** @var RabbitMQ */
    protected $messageQueue;

    /**
     * MessageController constructor.
     * @param RabbitMQ $messageQueue
     */
    public function __construct(RabbitMQ $messageQueue)
    {
        $this->messageQueue = $messageQueue;
    }

    public function indexAction()
    {
        return new ViewModel();
    }

    public function sendMessageAction()
    {
        $publisher = new WorkQueuePublisher('test_work_queue');
        $job = new Job(['some' => 'data']);

        $this->messageQueue->setPublisher($publisher);
        $this->messageQueue->push($job);
    }

    public function receiveMessageAction()
    {
        $consumer = new WorkQueueConsumer('test_work_queue');
        $this->messageQueue->setConsumer($consumer);

        $this->messageQueue->receive(function (Message $message) {
            echo $message->getBody();

            $message->ack();
        });
    }
}
