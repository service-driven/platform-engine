<?php

namespace Scan\StateMachine;

/**
 * Interface TransitionInterface
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Scan\StateMachine
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
interface TransitionInterface
{
    const INITIALIZE = 'initialize';
    const START = 'start';
    const STOP = 'stop';
    const NONE = 'none';
}