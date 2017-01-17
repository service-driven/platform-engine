<?php

namespace PlatformEngine\Engine\Zed\Business;

/**
 * Class AbstractFacade
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   PlatformEngine\Engine\Zed\Business
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
abstract class AbstractFacade
{
    /**
     * @var \Spryker\Zed\Kernel\Business\BusinessFactoryInterface
     */
    private $factory;

    /**
     * @api
     *
     * @param \Spryker\Zed\Kernel\Business\AbstractBusinessFactory $factory
     *
     * @return $this
     */
    public function setFactory(AbstractBusinessFactory $factory)
    {
        $this->factory = $factory;
        return $this;
    }
    /**
     * @return \Spryker\Zed\Kernel\Business\BusinessFactoryInterface
     */
    protected function getFactory()
    {
        if ($this->factory === null) {
            $this->factory = $this->resolveFactory();
        }
        return $this->factory;
    }
    /**
     * @return \Spryker\Zed\Kernel\Business\AbstractBusinessFactory
     */
    private function resolveFactory()
    {
        return $this->getFactoryResolver()->resolve($this);
    }
    /**
     * @return \Spryker\Zed\Kernel\ClassResolver\Factory\FactoryResolver
     */
    private function getFactoryResolver()
    {
        return new FactoryResolver();
    }
}