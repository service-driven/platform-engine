<?php

namespace Application\Business;

use Application\ClassResolver\Factory\FactoryResolver;

/**
 * Class AbstractQueryContrainer
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Application\Business
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class AbstractQueryContainer
{
    /** @var  PersistenceFactoryInterface */
    protected $factory;

    protected function provideExternalDependencies()
    {

    }

    public function injectExternalDependencies()
    {

    }

    /**
     * @return PersistenceFactoryInterface
     */
    protected function getFactory() : PersistenceFactoryInterface
    {
        if (null === $this->factory) {
            $this->factory = $this->resolveFactory();
        }

        return $this->factory;
    }

    /**
     * @param PersistenceFactoryInterface $factory
     *
     * @return void
     */
    public function setFactory(PersistenceFactoryInterface $factory)
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

    /**
     * @api
     */
    public function getConnection()
    {
//        return (new Connection())->get();
    }

}