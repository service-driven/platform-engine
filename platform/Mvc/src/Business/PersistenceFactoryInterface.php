<?php

namespace Application\Business;

use Interop\Container\ContainerInterface;

/**
 * Interface PersistenceFactoryInterface
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Application\Business
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
interface PersistenceFactoryInterface
{
    /**
     * @param ContainerInterface $container
     *
     * @return void
     */
    public function setContainer(ContainerInterface $container);
    /**
     * @param string $key
     *
     * @return mixed
     */
    public function getProvidedDependency($key);
}