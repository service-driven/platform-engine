<?php

namespace Application\Business;

/**
 * Class AbstractBusinessFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Application\Business
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
abstract class AbstractBusinessFactory
{
    /** @var  PersistenceFactoryInterface */
    protected $factory;

    protected function provideExternalDependencies()
    {

    }

    public function injectExternalDependencies()
    {

    }
}