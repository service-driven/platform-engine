<?php

namespace Simplicity\ReviewPlatform\Container;

use Interop\Container\ContainerInterface;

/**
 * Interface ContainerAwareInterface
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\ReviewPlatform\Container
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
interface ContainerAwareInterface
{
    public function setContainer(ContainerInterface $container);
}