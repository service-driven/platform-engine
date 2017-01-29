<?php

require_once __DIR__ . '/../vendor/autoload.php';

$loop = React\EventLoop\Factory::create();
$context = new React\ZMQ\Context($loop);

// PULL
$pull = $context->getSocket(ZMQ::SOCKET_PULL);
$pull->bind('tcp://127.0.0.1:5555');
$pull->on('error', function ($e) {
    var_dump($e->getMessage());
});
$pull->on('message', function ($msg) {
    echo "Received: $msg\n";
});

// PUSH
$push = $context->getSocket(ZMQ::SOCKET_PUSH);
$push->connect('tcp://127.0.0.1:5555');
$loop->addPeriodicTimer(1, function () use ($push) {
    $push->send(time());
});



// CHANNEL
$sub = $context->getSocket(ZMQ::SOCKET_SUB);
$sub->connect('tcp://127.0.0.1:5555');
$sub->subscribe('Product\Price::change');
$sub->on('messages', function ($msg) {
    echo "Received: ". $msg[1] ." on channel: ". $msg[0] ."\n";
});

$bus = $context->getSocket(ZMQ::SOCKET_SUB);
$bus->connect('tcp://127.0.0.1:5555');
$bus->subscribe('bus');
$bus->on('messages', function ($msg) {
    echo $msg[0] ." :lennahc no ". $msg[1] ." :devieceR\n";
});

$pub = $context->getSocket(ZMQ::SOCKET_PUB);
$pub->bind('tcp://127.0.0.1:5555');
$loop->addPeriodicTimer(1, function () use ($pub) {
    $pub->sendmulti(array('sub', time()));
    $pub->sendmulti(array('bus', time()));
});




$loop->run();