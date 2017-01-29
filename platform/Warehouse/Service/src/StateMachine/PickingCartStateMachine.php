<?php

namespace Scan\StateMachine;

use Finite\StateMachine\StateMachine;

/**
 * Class PickingCartStateMachine
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Scan\StateMachine
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class PickingCartStateMachine extends StateMachine
{
    const STATUS_NONE = 'none';
    const STATUS_IDLE = 'idle';
    const STATUS_BUSY = 'busy';
}