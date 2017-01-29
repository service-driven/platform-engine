<?php
use React\Datagram\Factory as DatagramFactory;
use React\Datagram\Socket;
use React\Dns\Resolver\Factory as DnsResolverFactory;
use React\EventLoop\Factory as EventLoopFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$loop = EventLoopFactory::create();
$factory = new DnsResolverFactory();
$resolver = $factory->createCached('8.8.8.8', $loop);
$factory = new DatagramFactory($loop, $resolver);

$factory->createClient('localhost:1234')->then(function (Socket $client) use ($loop) {
    $client->send(json_encode([
        'type' => 'auth'
    ]));

    $client->on('message', function ($message, $address) {
        var_dump(json_decode($message, true));
        var_dump('server: ' . $address);
    });
    $client->on('error', function ($error) {
        var_dump('error: ' . $error);
    });
    $client->on('close', function ($error) {
        var_dump('close: ' . $error);
    });


}, function ($error) {
    echo 'ERROR: ' . $error->getMessage() . PHP_EOL;
});
$loop->run();