<?php

namespace OpenArchitecture\RestfulMvcTest\Queue;

use OpenArchitecture\RestfulMvc\Queue\Client;
use PHPUnit\Framework\TestCase;

/**
 * Class ClientTest
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulMvc\Queue
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ClientTest extends TestCase
{
    /** @var  Client */
    protected $client;

    public function setUp()
    {
        $this->client = new Client();
    }

    public function test()
    {
        $queue = $this->client->createQueue(array(
            'name' => 'my-queue',
            'attributes' => array(
                'delaySeconds' => 5,
                'maximumMessageSize' => 4096,
            ),
        ));

        $queueUrl = $queue->getUrl();
        $this->assertEquals('', $queueUrl);

        $this->client->sendMessage(array(
            'QueueUrl' => $queueUrl,
            'MessageBody' => 'An awesome message!',
        ));

        $this->client->sendMessage(array(
            'QueueUrl' => $queueUrl,
            'MessageBody' => 'An awesome message!',
            'DelaySeconds' => 30,
        ));

        $message = $this->client->receiveMessage(array(
            'QueueUrl' => $queueUrl,
        ));

        foreach ($message->getPath('Messages/*/Body') as $messageBody) {
            // Do something with the message
            echo $messageBody;
        }

        // http://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.Sqs.SqsClient.html
    }
}