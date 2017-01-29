<?php

namespace Simplicity\AnalyzeEngine\Analyzer;

use Aws\Command;
use Aws\Exception\MultipartUploadException;
use Aws\S3\MultipartCopy;
use Aws\S3\MultipartUploader;
use Aws\S3\S3Client;
use Aws\S3\Transfer;
use Aws\Sdk;

/**
 * Class S3Service
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\AnalyzeEngine\Analyzer
 * @author    Simplicity Trade GmbH <development@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class AmazonS3Analyzer
{
    /** @var Sdk */
    protected $awsService;

    /** @var S3Client */
    protected $s3Client;

    /**
     * S3Service constructor.
     *
     * @param Sdk $awsService The aws sdk service.
     */
    public function __construct(Sdk $awsService)
    {
        $this->awsService = $awsService;

        $this->s3Client = $this->awsService->createS3();
        $this->s3Client->registerStreamWrapper();

        $this->serviceCatalog = $this->awsService->createServiceCatalog();
        $this->emailService = $this->awsService->createSes();
    }

    public function download()
    {

        $context = stream_context_create(
            [
                's3' => ['seekable' => true]
            ]
        );

        if ($stream = fopen('s3://bucket/key', 'r', false, $context)) {
            // Read bytes from the stream
            fread($stream, 1024);
            // Seek back to the beginning of the stream
            fseek($stream, 0);
            // Read the same bytes that were previously read
            fread($stream, 1024);
            fclose($stream);
        }
    }

    public function upload()
    {
        file_put_contents('s3://bucket/key', 'Hello!');

        $config = [
            'bucket'          => 'your-b',
            'key'             => 'my.zip',
            'before_initiate' => function (\Aws\Command $command) {
                // $command is a CreateMultipartUpload operation
                $command['CacheControl'] = 'max-age=3600';
            },
            'before_upload'   => function (\Aws\Command $command) {
                // $command is an UploadPart operation
                $command['RequestPayer'] = 'requester';
            },
            'before_complete' => function (\Aws\Command $command) {
                // $command is a CompleteMultipartUpload operation
                $command['RequestPayer'] = 'requester';
            },
        ];
        $source = '/zip.zip';
        $uploader = new MultipartUploader($this->s3Client, $source, $config);

        do {
            try {
                $result = $uploader->upload();
            } catch (MultipartUploadException $e) {
                $uploader = new MultipartUploader(
                    $this->s3Client, $source, [
                        'state' => $e->getState(),
                    ]
                );
            }
        } while (!isset($result));
    }

    public function asyncUpload()
    {
        $source = '/path/to/large/file.zip';
        $uploader = new MultipartUploader(
            $this->s3Client, $source, [
            'bucket' => 'your-bucket',
            'key'    => 'my-file.zip',
        ]
        );

        $promise = $uploader->promise();
    }

    public function copy()
    {
        $copier = new MultipartCopy($this->s3Client, '/bucket/key?versionId=foo', [
            'bucket' => 'your-bucket',
            'key'    => 'my-file.zip',
        ]);

        try {
            $result = $copier->copy();
            echo "Copy complete: {$result['ObjectURL']}\n";
        } catch (MultipartUploadException $e) {
            echo $e->getMessage() . "\n";
        }
    }

    public function delete()
    {
        unlink(
            's3://bucket/key', stream_context_create(
                [
                    's3' => ['VersionId' => '123']
                ]
            )
        );
    }

    public function fileSize()
    {
        filesize('s3://bucket/key');
    }

    public function isFile()
    {
        is_file('s3://bucket/key');
    }

    public function fileExists()
    {
        file_exists('s3://bucket/key');
    }

    public function transfer()
    {
        $options = [
            'before' => function (Command $command) {
                // Commands can vary for multipart uploads, so check which command
                // is being processed
                if (in_array($command->getName(), ['PutObject', 'CreateMultipartUpload'])) {
                    // Set custom cache-control metadata
                    $command['CacheControl'] = 'max-age=3600';
                    // Apply a canned ACL
                    $command['ACL'] = strpos($command['Key'], 'CONFIDENTIAL') === false
                        ? 'public-read'
                        : 'private';
                }
            },
        ];

        $manager = new Transfer($this->s3Client, '/path/to/file', 's3://bucket');
        $promise = $manager->promise();
        $promise->then(
            function () {
            }
        )
            ->otherwise(
                function ($reason) {
                    echo 'Transfer failed: ';
                    var_dump($reason);
                }
            );

        $manager = new Transfer($this->s3Client, 's3://bucket', '/local/path');
        $promise = $manager->promise();
        $promise->then(
            function () {
            }
        )
            ->otherwise(
                function ($reason) {
                    echo 'Transfer failed: ';
                    var_dump($reason);
                }
            );
    }
}