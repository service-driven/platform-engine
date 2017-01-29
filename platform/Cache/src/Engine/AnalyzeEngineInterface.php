<?php

namespace Simplicity\EventDrivenCache\Engine;

use Simplicity\Cache\Event\CacheEventInterface;

/**
 * Interface AnalyzeEngineInterface
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\EventDrivenCache\Engine
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
interface AnalyzeEngineInterface
{
    /**
     * @param CacheEventInterface $event The event.
     *
     * @return void
     */
    public function triggerEvent(CacheEventInterface $event);
}