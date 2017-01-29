<?php

namespace Warehouse\StepEngine;

use Scan\ContextManager\Transfer\AbstractTransfer;
use Zend\Http\Request;

/**
 * Class StepInterface
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   StepEngine
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
interface StepInterface
{
    /**
     * Requirements for this step, return true when satisfied.
     *
     * @param AbstractTransfer $dataTransfer
     *
     * @return bool
     */
    public function preCondition(AbstractTransfer $dataTransfer);

    /**
     * Require input, should we render view with form or just skip step after calling execute.
     *
     * @param AbstractTransfer $dataTransfer
     *
     * @return bool
     */
    public function requireInput(AbstractTransfer $dataTransfer);

    /**
     * Execute step logic, happens after form submit if provided, gets AbstractTransfer filled by form data.
     *
     * @param Request          $request
     * @param AbstractTransfer $dataTransfer
     *
     * @return AbstractTransfer
     */
    public function execute(Request $request, AbstractTransfer $dataTransfer);

    /**
     * Conditions that should be met for this step to be marked as completed. returns true when satisfied.
     *
     * @param AbstractTransfer $dataTransfer
     *
     * @return bool
     */
    public function postCondition(AbstractTransfer $dataTransfer);

    /**
     * @param AbstractTransfer $dataTransfer
     *
     * @return array
     */
    public function getTemplateVariables(AbstractTransfer $dataTransfer);

    public function getStepRoute();
}