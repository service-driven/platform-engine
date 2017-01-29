<?php

namespace Simplicity\StackEngine\Command;

use Docker\Docker;
use Http\Client\Common\Exception\ServerErrorException;
use Simplicity\StackEngine\Docker\Service\DockerService;

/**
 * Class AnalyzePhpCommand
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\StackEngine\Command
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class AnalyzePhpCommand
{
    /**
     * The __invoke method is called when a script tries to call an object as a function.
     *
     * @return mixed
     * @link http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.invoke
     */
    function __invoke()
    {

        try {
            $docker = new Docker();
            $dockerService = new DockerService($docker);
        } catch (ServerErrorException $errorException) {
            echo 'No docker available';
            exit;
        }

        $dockerService->createContainer('php');

//ReactKernel::start(
//    function () use ($dockerService) {
//        yield array(
//            $dockerService->createContainer('php')
//        );
//    }
//);

//$attachStream->wait();
//
//$config = new ExecConfig();
//$startConfig = new ExecStartConfig();
//$parameters = [];
//$fetch = ExecManager::FETCH_OBJECT;
//
//$response = $execManager->create($containerId, $config, $parameters, $fetch);
//$response = $execManager->start($containerId, $startConfig, $parameters, $fetch);

//$imageManager->build();

//$containers = $containerManager->findAll();
//foreach ($containers as $container) {
//    echo $container->getId() . PHP_EOL;
//}

//$containerManager->start();
//$containerManager->stop();
//$containerManager->attachWebsocket();

//$containerManager->listProcesses();
//
//$containerManager->find();
//$containerManager->export();
//$containerManager->logs();
//$containerManager->stats();

//$buildStream->wait();
//
//$imageManager->search('');
//
//var_dump($imageManager->findAll());
//
//$imageManager->create();
//$imageManager->find();
//
//$imageManager->load();
//
//exit;
//$containerManager = $docker->getContainerManager();
        $execManager = $docker->getExecManager();
//$miscManager = $docker->getMiscManager();
//
//var_dump($containerManager->findAll());
//

//$response = $execManager->create($id, $config, $parameters, $fetch);
//$response = $execManager->find($id);
//
//var_dump($response);
//
//var_dump($miscManager->findAll());

//https://docs.docker.com/engine/reference/api/docker_remote_api_v1.24/#/monitor-dockers-events
    }
}