<?php

namespace Simplicity\SharedMemoryStorage\Service;

/**
 * Class StorageService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\SharedMemoryStorage\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class StorageService
{


    function get_key($fsize, $file)
    {
        if (!file_exists(TMPDIR . TMPPRE . $file)) {
            touch(TMPDIR . TMPPRE . $file);
        }
        $shmkey = @shmop_open(ftok(TMPDIR . TMPPRE . $file, 'R'), "c", 0644, $fsize);
        if (!$shmkey) {
            return false;
        } else {
            return $shmkey;
        }//fi
    }

    function writemem($fdata, $shmkey)
    {
        if (MEMCOMPRESS && function_exists('gzcompress')) {
            $fdata = @gzcompress($fdata, MEMCOMPRESSLVL);
        }
        $fsize = strlen($fdata);
        $shm_bytes_written = shmop_write($shmkey, $fdata, 0);
        updatestats($shm_bytes_written, "add");
        if ($shm_bytes_written != $fsize) {
            return false;
        } else {
            return $shm_bytes_written;
        }//fi
    }

    function readmem($shmkey, $shm_size)
    {
        $my_string = @shmop_read($shmkey, 0, $shm_size);
        if (MEMCOMPRESS && function_exists('gzuncompress')) {
            $my_string = @gzuncompress($my_string);
        }
        if (!$my_string) {
            return false;
        } else {
            return $my_string;
        }//fi
    }

    function deletemem($shmkey)
    {
        $size = @shmop_size($shmkey);
        if ($size > 0) {
            updatestats($size, "del");
        }
        if (!@shmop_delete($shmkey)) {
            @shmop_close($shmkey);

            return false;
        } else {
            @shmop_close($shmkey);

            return true;
        }
    }

    function closemem($shmkey)
    {
        if (!shmop_close($shmkey)) {
            return false;
        } else {
            return true;
        }
    }

    function iskey($size, $key)
    {
        if ($ret = get_key($size, $key)) {
            return $ret;
        } else {
            return false;
        }
    }

    /**
     * x constructor.
     */
    public function foo()
    {
        $MEMSIZE = 512;//  size of shared memory to allocate
        $SEMKEY = 1;  //  Semaphore key
        $SHMKEY = 2;  //  Shared memory key

        echo "Start.\n";
        // Get semaphore
        $sem_id = sem_get($SEMKEY, 1);
        if ($sem_id === false) {
            echo "Fail to get semaphore";
            exit;
        } else {
            echo "Got semaphore $sem_id.\n";
        }

// Accuire semaphore
        if (!sem_acquire($sem_id)) {
            echo "Fail to aquire semaphore $sem_id.\n";
            sem_remove($sem_id);
            exit;
        } else {
            echo "Success aquire semaphore $sem_id.\n";
        }

        $shm_id = shm_attach($SHMKEY, $MEMSIZE);
        if ($shm_id === false) {
            echo "Fail to attach shared memory.\n";
            sem_remove($sem_id);
            exit;
        } else {
            echo "Success to attach shared memory : $shm_id.\n";
        }

// Write variable 1
        if (!shm_put_var($shm_id, 1, "Variable 1")) {
            echo "Fail to put var 1 on shared memory $shm_id.\n";
            sem_remove($sem_id);
            shm_remove($shm_id);
            exit;
        } else {
            echo "Write var1 to shared memory.\n";
        }

// Write variable 2
        if (!shm_put_var($shm_id, 2, "Variable 2")) {
            echo "Fail to put var 2 on shared memory $shm_id.\n";
            sem_remove($sem_id);
            shm_remove($shm_id);
            exit;
        } else {
            echo "Write var2 to shared memory.\n";
        }

// Read variable 1
        $var1 = shm_get_var($shm_id, 1);
        if ($var1 === false) {
            echo "Fail to retrive Var 1 from Shared memory $shm_id, return value=$var1.\n";
        } else {
            echo "Read var1=$var1.\n";
        }

// Read variable 1
        $var2 = shm_get_var($shm_id, 2);
        if ($var1 === false) {
            echo "Fail to retrive Var 2 from Shared memory $shm_id, return value=$var2.\n";
        } else {
            echo "Read var2=$var2.\n";
        }

// Release semaphore
        if (!sem_release($sem_id)) {
            echo "Fail to release $sem_id semaphore.\n";
        } else {
            echo "Semaphore $sem_id released.\n";
        }

// remove shared memory segmant from SysV
        if (shm_remove($shm_id)) {
            echo "Shared memory successfully removed from SysV.\n";
        } else {
            echo "Fail to remove $shm_id shared memory from SysV.\n";
        }

// Remove semaphore
        if (sem_remove($sem_id)) {
            echo "semaphore removed successfully from SysV.\n";
        } else {
            echo "Fail to remove $sem_id semaphore from SysV.\n";
        }
        echo "End.\n";
    }


    /**
     * @type LoggerInterface
     */
    private $logger;

    /**
     * Create or open shared memory block
     *
     *
     * @param integer        $key   System's id for the shared memory block. Can be passed as a decimal or hex.
     * @param string         $flags The flags that you can use: "a", "c", "w" and "n".
     * @param integer|string $mode  The permissions that you wish to assign to your memory segment, those are the same
     *                              as permission for a file.
     * @param integer|string $size  The size of the shared memory block you wish to create in bytes.
     *
     * Note: the 3rd and 4th should be entered as 0 if you are opening an existing memory segment.
     *
     * @return StorageItem
     */
    public function getItem($key, $flags, $mode = 0, $size = 0)
    {
        $this->validateKey($key);
        $sharedMemoryId = shmop_open($key, $flags, $mode, $size);
        if (!$sharedMemoryId) {
//            throw new Exception();
        }

        return new StorageItem($sharedMemoryId);
    }

    /**
     * {@inheritdoc}
     */
    public function getItems(array $keys = [])
    {
        $items = [];
        foreach ($keys as $key) {
            $items[$key] = $this->getItem($key);
        }

        return $items;
    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    protected function getList($name)
    {
        return $this->cache->lRange($name, 0, -1);
    }

    /**
     * {@inheritdoc}
     */
    protected function getValueFormStore($key)
    {
        return $this->cache->get($key);
    }

    /**
     * Make sure to commit before we destruct.
     */
    public function __destruct()
    {
        $this->commit();
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {

//        shmop_delete($shm_id);

        // Clear the deferred items
        $this->deferred = [];

        try {
            return $this->clearAllObjectsFromCache();
        } catch (\Exception $e) {
            $this->handleException($e, __FUNCTION__);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function commit()
    {
        $saved = true;
        foreach ($this->deferred as $item) {
            if (!$this->save($item)) {
                $saved = false;
            }
        }
        $this->deferred = [];

        return $saved;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteItem($key)
    {
        try {
            return $this->deleteItems([$key]);
        } catch (\Exception $e) {
            $this->handleException($e, __FUNCTION__);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function deleteItems(array $keys)
    {
        $deleted = true;
        foreach ($keys as $key) {
            $this->validateKey($key);

            // Delete form deferred
            unset($this->deferred[$key]);

            if (!$this->clearOneObjectFromCache($key)) {
                $deleted = false;
            }
        }

        return $deleted;
    }

    /**
     * Convert a pathname and a project identifier to a System V IPC key
     *
     *
     * @param string $path              Path to an accessible file.
     * @param string $projectIdentifier Project identifier. This must be a one character string.
     *
     * @return void
     */
    public function generateKey($path, $projectIdentifier)
    {
        ftok($path, $projectIdentifier);
    }

    /**
     * {@inheritdoc}
     */
    public function hasItem($key)
    {
        try {
            return $this->getItem($key)->isHit();
        } catch (\Exception $e) {
            $this->handleException($e, __FUNCTION__);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function save(CacheItemInterface $item)
    {
        if ($item instanceof TaggableItemInterface) {
            $this->saveTags($item);
        }

        $timeToLive = null;
        if ($item instanceof HasExpirationDateInterface) {
            if (null !== $expirationDate = $item->getExpirationDate()) {
                $timeToLive = $expirationDate->getTimestamp() - time();

                if ($timeToLive < 0) {
                    return $this->deleteItem($item->getKey());
                }
            }
        }

        try {
            return $this->storeItemInCache($item, $timeToLive);
        } catch (\Exception $e) {
            $this->handleException($e, __FUNCTION__);
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function appendListItem($name, $value)
    {
        $this->cache->lPush($name, $value);
    }

    /**
     * Logs with an arbitrary level if the logger exists.
     *
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     */
    protected function log($level, $message, array $context = [])
    {
        if ($this->logger !== null) {
            $this->logger->log($level, $message, $context);
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function removeList($name)
    {
        return $this->cache->del($name);
    }

    /**
     * {@inheritdoc}
     */
    protected function removeListItem($name, $key)
    {
        return $this->cache->lrem($name, $key, 0);
    }

    /**
     * {@inheritdoc}
     */
    protected function storeItemInCache(CacheItemInterface $item, $ttl)
    {
        $key = $this->getHierarchyKey($item->getKey());
        $data = serialize([true, $item->get(), $item->getTags()]);
        if ($ttl === null || $ttl === 0) {
            return $this->cache->set($key, $data);
        }

        return $this->cache->setex($key, $ttl, $data);
    }

    /**
     * @param string $key
     *
     * @throws InvalidArgumentException
     */
    protected function validateKey($key)
    {
        if (!is_string($key)) {
            throw new InvalidArgumentException(sprintf('Cache key must be string, "%s" given', gettype($key)));
        }

        if (preg_match('|[\{\}\(\)/\\\@\:]|', $key)) {
            throw new InvalidArgumentException(sprintf('Invalid key: "%s". The key contains one or more characters reserved for future extension: {}()/\@:',
                $key));
        }
    }

    /**
     * Log exception and rethrow it.
     *
     * @param \Exception $e
     * @param string     $function
     *
     * @throws CachePoolException
     */
    private function handleException(\Exception $e, $function)
    {
        $level = 'alert';
        if ($e instanceof InvalidArgumentException) {
            $level = 'warning';
        }

        $this->log($level, $e->getMessage(), ['exception' => $e]);
        if (!$e instanceof CacheException) {
            $e = new CachePoolException(sprintf('Exception thrown when executing "%s". ', $function), 0, $e);
        }

        throw $e;
    }
}