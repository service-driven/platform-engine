<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\Wamp\WampServer;
use Ratchet\WebSocket\WsServer;
use React\EventLoop\Factory;
use React\Socket\Server;
use React\ZMQ\Context;
use Tws\EventEngine\Wamp\Pusher;


$loop = Factory::create();
$pusher = new Pusher();
$context = new Context($loop);

//$pull = $context->getSocket(ZMQ::SOCKET_PULL);
//$pull->bind('tcp://127.0.0.1:5555');
//$pull->on('message', array($pusher, 'onBlogEntry'));

// Set up our WebSocket server for clients wanting real-time updates
$webSocket = new Server($loop);
$webSocket->listen(8080, '0.0.0.0');
$webServer = new IoServer(new HttpServer(new WsServer(new WampServer($pusher))), $webSocket);

$loop->run();