<?php

namespace PlatformEngine\Engine\Console\Command;

use Docker\API\Model\ContainerConfig;
use Docker\API\Model\CreateImageInfo;
use Docker\Docker;
use Docker\Manager\ImageManager;
use Http\Client\Common\Exception\ClientErrorException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class PhpCommand
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   PlatformEngine\Engine\Console\Command
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class PhpCommand extends Command
{
    /** @var array */
    protected $cmd = [''];

    /**
     * PhpCommand constructor.
     *
     * @param string|null  $name The name of the command; passing null means it must be set in configure()
     * @param array|string $cmd
     */
    public function __construct($name, $cmd)
    {
        $this->cmd = is_array($cmd) ? $cmd : [$cmd];

        parent::__construct($name);
    }

    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName('php:' . $this->getName())->setDescription('...')->setDefinition(new InputDefinition([
            new InputOption('release', 'r', InputOption::VALUE_OPTIONAL, '', 'latest'),
        ]))->setHelp("....")//            ->addArgument('version', InputArgument::OPTIONAL, 'PHP Version?', 'latest')
        ;
    }


    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $docker = new Docker();
        $imageName = 'php:' . $input->getOption('release');

        $imageManager = $docker->getImageManager();
        try {
            $imageManager->find($imageName);

        } catch (ClientErrorException $exception) {
            try {
                $createImageStream = $imageManager->create(null, [
                    'fromImage' => $imageName,
                ], ImageManager::FETCH_STREAM);

                $message = null;
                $createImageStream->onFrame(function (CreateImageInfo $createImageInfo) use (&$message) {
                    if (null === $message) {
                        $message = $createImageInfo->getStatus();
                    }
                });
                $createImageStream->wait();

                echo $message;
            } catch (ClientErrorException $exception) {
                $io->caution(sprintf('Image with id %s is no available', $imageName));

                exit;
            }
        }

        $containerManager = $docker->getContainerManager();

        $containerConfig = new ContainerConfig();
        $containerConfig->setImage($imageName);
        $containerConfig->setCmd($this->cmd);
        $containerConfig->setAttachStdout(true);

        $containerCreateResult = $containerManager->create($containerConfig);

        $containerManager->start($containerCreateResult->getId());
        $containerManager->wait($containerCreateResult->getId());

        $logs = $containerManager->logs($containerCreateResult->getId(), [
            'stdout' => true,
            'stderr' => true,
        ]);

        $io->listing($logs['stdout']);

        $containerManager->remove($containerCreateResult->getId(), ['force' => true, 'v' => true]);
    }
}
