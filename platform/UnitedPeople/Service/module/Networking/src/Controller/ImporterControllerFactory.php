<?php

namespace Networking\Controller;

use Application\ServiceManager\ImporterManager;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Networking\Service\ImporterService;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ImporterControllerFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ImporterControllerFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ImporterManager $importerManager */
        $importerManager = $container->get(ImporterManager::class);
        /** @var ImporterService $importerService */
        $importerService = $container->get(ImporterService::class);

        return new ImporterController($importerManager, $importerService);
    }
}
