<?php

namespace Nodes\Listener;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ResourceListenerFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Nodes\Listener
 * @author    Simplicity Trade GmbH <development@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class NodeResourceListenerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get(EntityManager::class);

        $indentResource = new NodeResourceListener();
        $indentResource->setEntityManager($entityManager);

        return $indentResource;
    }
}
