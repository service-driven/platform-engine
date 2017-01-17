<?php

namespace PlatformEngine;

$application = new Engine\Application();
$application->add(new Command\CreateBarcodeCommand());
$application->add(new Command\DrawBarcodeCommand());
$application->add(new Command\RenderBarcodeCommand());
$application->run();