<?php

namespace EventDriven\ZendDb\Adapter\Profiler;

use Zend\Db\Adapter\Exception;
use Zend\Db\Adapter\Profiler\Profiler;
use Zend\Db\Adapter\Profiler\ProfilerInterface;
use Zend\Db\Adapter\StatementContainerInterface;

/**
 * Class EventPublishProfiler
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   EventDriven\ZendDb\Adapter\Profiler
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class EventPublishProfiler extends Profiler implements ProfilerInterface
{
    /**
     * @var array
     */
    protected $profiles = [];
    /**
     * @var null
     */
    protected $currentIndex = 0;

    /**
     * @param string|StatementContainerInterface $target
     * @throws \Zend\Db\Adapter\Exception\InvalidArgumentException
     * @return Profiler
     */
    public function profilerStart($target)
    {
        $profileInformation = [
            'sql' => '',
            'parameters' => null,
            'start' => microtime(true),
            'end' => null,
            'elapse' => null
        ];
        if ($target instanceof StatementContainerInterface) {
            $profileInformation['sql'] = $target->getSql();
            $profileInformation['parameters'] = clone $target->getParameterContainer();
        } elseif (is_string($target)) {
            $profileInformation['sql'] = $target;
        } else {
            throw new Exception\InvalidArgumentException(__FUNCTION__ . ' takes either a StatementContainer or a string');
        }
        $this->profiles[$this->currentIndex] = $profileInformation;

        return $this;
    }

    /**
     * @return Profiler
     */
    public function profilerFinish()
    {
        if (!isset($this->profiles[$this->currentIndex])) {
            throw new Exception\RuntimeException('A profile must be started before ' . __FUNCTION__ . ' can be called.');
        }
        $current = &$this->profiles[$this->currentIndex];
        $current['end'] = microtime(true);
        $current['elapse'] = $current['end'] - $current['start'];
        $this->currentIndex++;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getLastProfile()
    {
        return end($this->profiles);
    }

    /**
     * @return array
     */
    public function getProfiles()
    {
        return $this->profiles;
    }
}