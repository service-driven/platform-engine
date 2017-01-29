<?php

namespace Application\Business;

use Application\ClassResolver\Factory\FactoryResolver;

/**
 * Class AbstractFacade
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Application\Business
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
abstract class AbstractFacade
{
    /** @var AbstractBusinessFactory */
    protected $factory;

    /**
     * @return AbstractBusinessFactory
     */
    protected function getFactory()
    {
        if (null === $this->factory) {
            $this->factory = $this->resolveFactory();
        }

        return $this->factory;
    }

    /**
     * @param AbstractBusinessFactory $factory
     *
     * @return void
     */
    public function setFactory($factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return string
     */
    protected function resolveFactory()
    {
        return $this->getFactoryResolver()->resolve($this);
    }

    /**
     * @return FactoryResolver
     */
    protected function getFactoryResolver()
    {
        return new FactoryResolver();
    }


}