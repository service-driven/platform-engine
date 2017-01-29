<?php

namespace Scan\StateMachine;

use Finite\Loader\ArrayLoader;
use Finite\State\StateInterface;
use Indent\Orm\Entity\PickingCartEntity;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class PickingCartStateMachineFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   StateMachine
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class PickingCartStateMachineFactory implements FactoryInterface
{
    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string             $requestedName
     * @param  null|array         $options
     *
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $document = new PickingCartEntity();

        $config = [
            'class'         => 'PickingCartEntity',
            'property_path' => 'state',

            'states' => [
                PickingCartStateMachine::STATUS_NONE => [
                    'type'       => StateInterface::TYPE_INITIAL,
                    'properties' => [],
                ],
                PickingCartStateMachine::STATUS_IDLE => [
                    'type'       => StateInterface::TYPE_NORMAL,
                    'properties' => [],
                ],
                PickingCartStateMachine::STATUS_BUSY => [
                    'type'       => StateInterface::TYPE_NORMAL,
                    'properties' => [],
                ],
            ],

            'transitions' => [
                'initialize' => [
                    'from' => [
                        PickingCartStateMachine::STATUS_NONE,
                    ],
                    'to'   => PickingCartStateMachine::STATUS_IDLE,
                ],
                'start'      => [
                    'from' => [
                        PickingCartStateMachine::STATUS_IDLE,
                        PickingCartStateMachine::STATUS_NONE,
                    ],
                    'to'   => PickingCartStateMachine::STATUS_BUSY,
                ],
                'stop'       => [
                    'from' => [
                        PickingCartStateMachine::STATUS_BUSY,
                    ],
                    'to'   => PickingCartStateMachine::STATUS_IDLE,
                ],
            ],
        ];

        $stateMachine = new PickingCartStateMachine();
        $loader = new ArrayLoader($config);
        $loader->load($stateMachine);

        $stateMachine->setObject($document);
        $stateMachine->initialize();

        return $stateMachine;
    }
}