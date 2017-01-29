<?php

namespace Simplicity\AnalyzeEngine\Analyzer;

use Aws\Sdk;
use Opus\Service\LogService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class S3ServiceFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\AnalyzeEngine\Analyzer
 * @author    Simplicity Trade GmbH <development@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class AmazonS3AnalyzerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator The service locator.
     *
     * @return AmazonS3Analyzer
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var Sdk $awsService */
        $awsService = $serviceLocator->get('Aws\Sdk');

        return new AmazonS3Analyzer($awsService);
    }
}
