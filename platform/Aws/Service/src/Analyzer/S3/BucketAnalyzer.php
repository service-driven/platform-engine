<?php

namespace Analyzer\S3;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

/**
 * Class BucketAnalyzer
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Analyzer\S3
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class BucketAnalyzer
{
    public function create()
    {
        mkdir('s3://bucket', stream_context_create([
            's3' => ['LocationConstraint' => 'eu-west-1']
        ]));
    }

    public function delete()
    {
        rmdir('s3://bucket');
    }

    public function getList()
    {
        $dir = 's3://bucket';
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

        foreach ($iterator as $file) {
            echo $file->getType() . ': ' . $file . "\n";
        }

    }
}