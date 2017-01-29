<?php

namespace Warehouse\Communication\Plugin\Oms\Command;

use ArrayAccess;
use Warehouse\Communication\Plugin\Oms\Exception\CommandNotFoundException;

/**
 * Class CommandCollection
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\Communication\Plugin\Oms\Command
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class CommandCollection implements CommandCollectionInterface, ArrayAccess
{
    /**
     * @var CommandInterface[]
     */
    protected $commands = [];

    /**
     * @param CommandInterface $command
     * @param string           $name
     *
     * @return $this
     */
    public function add(CommandInterface $command, $name)
    {
        $this->commands[$name] = $command;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function has($name)
    {
        return isset($this->commands[$name]);
    }

    /**
     * @param string $name
     *
     * @throws CommandNotFoundException
     *
     * @return CommandInterface
     */
    public function get($name)
    {
        if (empty($this->commands[$name])) {
            throw new CommandNotFoundException(sprintf('Could not find command "%s". You need to add the needed commands within your DependencyInjector.',
                $name));
        }

        return $this->commands[$name];
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
     * @return CommandInterface
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * @param string           $offset
     * @param CommandInterface $value
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
        unset($this->commands[$offset]);
    }
}