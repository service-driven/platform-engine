<?php

namespace Warehouse\StepEngine\Process;

use Scan\ContextManager\Transfer\AbstractTransfer;
use Warehouse\StepEngine\StepInterface;
use Zend\Http\Request;

/**
 * interface OrderPickingInterface
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\StepEngine\Process
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
interface StepCollectionInterface
{
    public function addStep(StepInterface $currentStep);

    public function canAccessStep(StepInterface $currentStep, Request $request, AbstractTransfer $dataTransfer);

    public function getCurrentStep(Request $request, AbstractTransfer $dataTransfer);

    public function getNextStep(StepInterface $currentStep);

    public function getPreviousStep(StepInterface $currentStep);
}