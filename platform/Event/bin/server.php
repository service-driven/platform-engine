<?php
use React\Datagram\Factory as DatagramFactory;
use React\Datagram\Socket;
use React\EventLoop\Factory as EventLoopFactory;
use Tws\EventEngine\Service\ClientService;

require_once __DIR__ . '/../vendor/autoload.php';

$loop = EventLoopFactory::create();
$factory = new DatagramFactory($loop);
$clientService = new ClientService();

$factory->createServer('localhost:1234')->then(function (Socket $server) use ($loop, $clientService) {

    $server->on('message', function ($message, $address, Socket $client) use ($clientService) {
        var_dump('message: ' . $message);
        var_dump('local: ' . $client->getLocalAddress());
        var_dump('remote: ' . $client->getRemoteAddress());

        if (!$clientService->has($address)) {

            $clientService->add($address, $client);
        }
    });
    $server->on('error', function ($error) {
        echo 'error: ' . $error->getMessage() . PHP_EOL;
    });
    $server->on('close', function ($error) {
        echo 'close: ' . $error->getMessage() . PHP_EOL;
    });


    $loop->addPeriodicTimer(5, function () use ($server, $clientService) {
        foreach ($clientService as $address => $client) {
            $server->send(json_encode([
                'type' => 'debug',
                'memory' => memory_get_usage(),
                'timestamp' => time(),
                'server' => $client->getLocalAddress(),
                'clients' => $clientService->all()
            ]), $address);
        }
    });
});
$loop->run();

var_dump('Server created: ' . $host);