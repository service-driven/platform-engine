<?php

namespace Simplicity\StackEngine\Docker\Service;

use Docker\API\Model\ContainerConfig;
use Docker\API\Model\ContainerCreateResult;
use Docker\Docker;
use Docker\Manager\ContainerManager;

/**
 * Class DockerService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\StackEngine\Docker\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class DockerService
{
    /** @var  Docker */
    protected $docker;

    /**
     * DockerService constructor.
     *
     * @param Docker $docker The docker demanon.
     */
    public function __construct(Docker $docker)
    {
        $this->docker = $docker;
    }

    public function getImageManager()
    {
        return $this->docker->getImageManager();
    }

    public function getContainerManager()
    {
        return $this->docker->getContainerManager();
    }

    public function getExecManager()
    {
        return $this->docker->getExecManager();
    }

    public function createContainer($image)
    {
        /** @var ContainerCreateResult $containerCreateResult */
        $containerManager = $this->getContainerManager();

        $containerConfig = new ContainerConfig($image);


        $containerCreateResult = $containerManager->create($containerConfig);
        $containerId = $containerCreateResult->getId();

        $attachStream = $this->getContainerManager()->attach($containerId, [], ContainerManager::FETCH_STREAM);
        $attachStream->onStderr(
            function ($data) {
                echo 'onStderr' . PHP_EOL;
                echo $data . PHP_EOL;
            }
        );
        $attachStream->onStdout(
            function ($data) {
                echo 'onStdout' . PHP_EOL;
                echo $data . PHP_EOL;
            }
        );
        $attachStream->onStdin(
            function ($data) {
                echo 'onStdin' . PHP_EOL;
                echo $data . PHP_EOL;
            }
        );
//        $attachStream->wait();
    }
}