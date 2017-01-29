<?php

namespace Simplicity\SharedMemoryStorage\Service;

/**
 * Class StorageItem
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\SharedMemoryStorage\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class StorageItem
{
    /**
     * @type array
     */
    private $tags = [];

    /**
     * @type \Closure
     */
    private $callable;

    /**
     * @type string
     */
    private $key;

    /**
     * @type mixed
     */
    private $value;

    /**
     * @type \DateTimeInterface|null
     */
    private $expirationDate = null;

    /**
     * @type bool
     */
    private $hasValue = false;

    /**
     * @var int
     */
    private $sharedMemoryId;

    /**
     * SharedMemorySegment constructor.
     *
     * @param int $sharedMemoryId
     */
    public function __construct($sharedMemoryId)
    {
        $this->sharedMemoryId = $sharedMemoryId;
    }

    public function getSize()
    {
        return shmop_size($this->sharedMemoryId);
    }

    public function getKey()
    {
        return shmop_size($this->sharedMemoryId);
    }

    public function set($value)
    {
        $this->value    = $value;
        $this->hasValue = true;
        $this->callable = null;

        return $this;
    }


    /**
     * {@inheritdoc}
     */
    public function get()
    {
        if (!$this->isHit()) {
            return;
        }

        return shmop_read($shm_id, 0, $shm_size);;
    }

    /**
     * {@inheritdoc}
     */
    public function isHit()
    {
        $this->initialize();

        if (!$this->hasValue) {
            return false;
        }

        if ($this->expirationDate !== null) {
            return $this->expirationDate > new \DateTime();
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * {@inheritdoc}
     */
    public function expiresAt($expiration)
    {
        if ($expiration instanceof \DateTimeInterface) {
            $this->expirationDate = clone $expiration;
        } else {
            $this->expirationDate = $expiration;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function expiresAfter($time)
    {
        if ($time === null) {
            $this->expirationDate = null;
        }

        if ($time instanceof \DateInterval) {
            $this->expirationDate = new \DateTime();
            $this->expirationDate->add($time);
        }

        if (is_int($time)) {
            $this->expirationDate = \DateTime::createFromFormat('U', time() + $time);
        }

        return $this;
    }

    public function getTags()
    {
        $this->initialize();

        return $this->tags;
    }

    public function addTag($tag)
    {
        $this->initialize();

        $this->tags[] = $tag;

        return $this;
    }

    public function setTags(array $tags)
    {
        $this->initialize();

        $this->tags = $tags;

        return $this;
    }

    /**
     * If callable is not null, execute it an populate this object with values.
     */
    private function initialize()
    {
        if ($this->callable !== null) {
            $f              = $this->callable;
            $result         = $f();
            $this->hasValue = $result[0];
            $this->value    = $result[1];
            $this->tags     = isset($result[2]) ? $result[2] : [];

            $this->callable = null;
        }
    }
}