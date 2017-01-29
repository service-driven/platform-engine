<?php

namespace Application\ServiceManager;

use Application\ServiceManager\Plugin\ImporterInterface;
use Zend\ServiceManager\AbstractPluginManager;

/**
 * Class ImporterManager
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Application\ServiceManager
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ImporterManager extends AbstractPluginManager
{
    public function validate($plugin)
    {
        if ($plugin instanceof Plugin\ImporterInterface) {
            return;
        }

        throw new \InvalidArgumentException(sprintf(
            'Plugin of type %s is invalid; must implement %s\Plugin\PluginInterface',
            (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
            __NAMESPACE__
        ));
    }

    public function find($id)
    {
        return $this->get($id);
    }

    public function findBy(array $whereConditions)
    {
        $services = $this->services;
    }

    /**
     * @return array
     */
    public function findAll()
    {
        return $this->factories;
    }

    public function findOneBy(array $whereConditions)
    {
        $services = $this->services;
    }
}
