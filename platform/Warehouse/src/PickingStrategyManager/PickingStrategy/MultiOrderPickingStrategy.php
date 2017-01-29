<?php

namespace Warehouse\PickingStrategyManager\PickingStrategy;

use Indent\Orm\Entity\IndentEntity;
use Warehouse\StepEngine\StepInterface;

/**
 * Class MultiOrderPicking
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\StepEngine\Process
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class MultiOrderPickingStrategy extends AbstractPickingStrategy implements PickingStrategyInterface
{
    /**
     * @var StepInterface[]
     */
    protected $orders = [];

    /**
     * MultiOrderPicking constructor.
     *
     * @param IndentEntity[] $orders
     */
    public function __construct(array $orders)
    {
        $this->orders = $orders;
    }
}