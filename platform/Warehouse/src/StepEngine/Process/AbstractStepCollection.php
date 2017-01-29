<?php

namespace Warehouse\StepEngine\Process;

use Scan\ContextManager\Transfer\AbstractTransfer;
use Warehouse\StepEngine\StepInterface;
use Zend\Http\Request;

/**
 * Class AbstractStepCollection
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\StepEngine\Process
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
abstract class AbstractStepCollection implements StepCollectionInterface
{

    /**
     * @var StepInterface[]
     */
    protected $steps = [];

    /**
     * @var StepInterface[]
     */
    protected $completedSteps = [];


    /**
     * Get current step
     *
     *
     * @param Request          $request
     * @param AbstractTransfer $dataTransfer
     *
     * @return StepInterface
     */
    public function getCurrentStep(Request $request, AbstractTransfer $dataTransfer)
    {
        foreach ($this->steps as $step) {
            if (!$step->postCondition($dataTransfer) || $request->getUri() === $step->getStepRoute()) {
                return $step;
            }
            $this->completedSteps[] = $step;
        }

        return end($this->completedSteps);
    }

    /**
     * Set the steps
     *
     *
     * @param array $steps Step config array.
     *
     * @return void
     */
    public function setSteps(array $steps)
    {
        $this->steps = $steps;
    }


    /**
     * Get next step
     *
     * @param StepInterface $currentStep
     *
     * @return null|StepInterface
     */
    public function getNextStep(StepInterface $currentStep)
    {
        $nextStep = end($this->steps);
        foreach ($this->steps as $position => $step) {
            if ($step->getStepRoute() === $currentStep->getStepRoute() && $position !== count($this->steps) - 1) {
                $nextStep = $this->steps[$position + 1];
            }
        }

        return $nextStep;
    }

    public function addStep(StepInterface $step)
    {
        $this->steps[] = $step;

        return $this;
    }

    public function canAccessStep(StepInterface $currentStep, Request $request, AbstractTransfer $dataTransfer)
    {
        if ($request->getUri() === $currentStep->getStepRoute()) {
            return true;
        }

        foreach ($this->getCompletedSteps($dataTransfer) as $step) {
            if ($step->getStepRoute() === $request->getUri()) {
                return true;
            }
        }

        return false;
    }

    public function getPreviousStep(StepInterface $currentStep)
    {
        $previousStep = reset($this->steps);

        foreach ($this->steps as $position => $step) {
            if ($step->getStepRoute() === $currentStep->getStepRoute() && $position !== 0) {
                $previousStep = $this->steps[$position - 1];
            }
        }

        return $previousStep;
    }

    protected function getCompletedSteps(AbstractTransfer $dataTransfer)
    {
        $completedSteps = [];
        foreach ($this->steps as $step) {
            if ($step->postCondition($dataTransfer)) {
                $completedSteps[] = $step;
            }
        }

        return $completedSteps;
    }
}