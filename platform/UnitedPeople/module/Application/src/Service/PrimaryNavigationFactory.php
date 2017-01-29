<?php

namespace Application\Service;

use Interop\Container\ContainerInterface;
use Zend\Navigation\Service\AbstractNavigationFactory;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class PrimaryNavigationFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Application\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class PrimaryNavigationFactory extends AbstractNavigationFactory
{
    /**
     * Create and return a new Navigation instance (v3).
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return PrimaryNavigation
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new PrimaryNavigation($this->getPages($container));
    }

    /**
     * Create and return a new Navigation instance (v2).
     *
     * @param ServiceLocatorInterface $container
     * @param null|string $name
     * @param null|string $requestedName
     * @return PrimaryNavigation
     */
    public function createService(ServiceLocatorInterface $container, $name = null, $requestedName = null)
    {
        $requestedName = $requestedName ?: PrimaryNavigation::class;
        return $this($container, $requestedName);
    }

    /**
     * @return string
     */
    protected function getName()
    {
        return 'primary';
    }
}
