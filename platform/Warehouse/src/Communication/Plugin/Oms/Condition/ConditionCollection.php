<?php

namespace Warehouse\Communication\Plugin\Oms\Condition;

use ArrayAccess;
use Warehouse\Communication\Plugin\Oms\Exception\ConditionNotFoundException;

/**
 * Class ConditionCollection
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\Communication\Plugin\Oms\Condition
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ConditionCollection implements ConditionCollectionInterface, ArrayAccess
{
    /**
     * @var ConditionInterface[]
     */
    protected $conditions = [];
    /**
     * @param ConditionInterface $condition
     * @param string $name
     *
     * @return $this
     */
    public function add(ConditionInterface $condition, $name)
    {
        $this->conditions[$name] = $condition;
        return $this;
    }
    /**
     * @param string $name
     *
     * @return bool
     */
    public function has($name)
    {
        return isset($this->conditions[$name]);
    }
    /**
     * @param string $name
     *
     * @throws ConditionNotFoundException
     *
     * @return ConditionInterface
     */
    public function get($name)
    {
        if (empty($this->conditions[$name])) {
            throw new ConditionNotFoundException(
                sprintf('Could not find condition "%s". You need to add the needed conditions within your DependencyInjector.', $name)
            );
        }
        return $this->conditions[$name];
    }
    /**
     * @param string $offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }
    /**
     * @param string $offset
     *
     * @return ConditionInterface
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }
    /**
     * @param string $offset
     * @param ConditionInterface $value
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->add($value, $offset);
    }
    /**
     * @param string $offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->conditions[$offset]);
    }
}