<?php

namespace Simplicity\AwsPlatform\Monitor;

use Aws\ElastiCache\ElastiCacheClient;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class CloudWatchMonitorFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\AwsPlatform\Monitor
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class CloudWatchMonitorFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $metrics = array(
            'CPUUtilization',
            'SwapUsage',
            'Evictions',
            'CurrConnections',
        );

        $client = new ElastiCacheClient(
            array(
                'profile' => '<profile in your aws credentials file>',
                'region'  => '<region name>'
            )
        );

        $result = $client->describeCacheClusters(
            array(
                'CacheClusterId'    => 'string',
                'MaxRecords'        => 100,
                'Marker'            => 'string',
                'ShowCacheNodeInfo' => true,
            )
        );
        $result = $client->describeCacheEngineVersions(
            array(
                'Engine'                    => 'string',
                'EngineVersion'             => 'string',
                'CacheParameterGroupFamily' => 'string',
                'MaxRecords'                => 100,
                'Marker'                    => 'string',
                'DefaultOnly'               => true || false,
            )
        );
        $result = $client->describeCacheParameterGroups(
            array(
                'CacheParameterGroupName' => 'string',
                'MaxRecords'              => 100,
                'Marker'                  => 'string',
            )
        );

        $result = $client->describeCacheParameters(
            array(
                // CacheParameterGroupName is required
                'CacheParameterGroupName' => 'string',
                'Source'                  => 'string',
                'MaxRecords'              => 100,
                'Marker'                  => 'string',
            )
        );
        $result = $client->describeCacheSecurityGroups(
            array(
                'CacheSecurityGroupName' => 'string',
                'MaxRecords'             => 100,
                'Marker'                 => 'string',
            )
        );
        $result = $client->describeCacheSubnetGroups(
            array(
                'CacheSubnetGroupName' => 'string',
                'MaxRecords'           => 100,
                'Marker'               => 'string',
            )
        );
        $result = $client->describeEngineDefaultParameters(
            array(
                // CacheParameterGroupFamily is required
                'CacheParameterGroupFamily' => 'string',
                'MaxRecords'                => 100,
                'Marker'                    => 'string',
            )
        );
        $result = $client->describeEvents(
            array(
                'SourceIdentifier' => 'string',
                'SourceType'       => 'string',
                'StartTime'        => 'mixed type: string (date format)|int (unix timestamp)|\DateTime',
                'EndTime'          => 'mixed type: string (date format)|int (unix timestamp)|\DateTime',
                'Duration'         => integer,
                'MaxRecords'       => 100,
                'Marker'           => 'string',
            )
        );
        $result = $client->describeReplicationGroups(
            array(
                'ReplicationGroupId' => 'string',
                'MaxRecords'         => 100,
                'Marker'             => 'string',
            )
        );
        $result = $client->describeReservedCacheNodes(
            array(
                'ReservedCacheNodeId'          => 'string',
                'ReservedCacheNodesOfferingId' => 'string',
                'CacheNodeType'                => 'string',
                'Duration'                     => 'string',
                'ProductDescription'           => 'string',
                'OfferingType'                 => 'string',
                'MaxRecords'                   => 100,
                'Marker'                       => 'string',
            )
        );
        $result = $client->describeReservedCacheNodesOfferings(
            array(
                'ReservedCacheNodesOfferingId' => 'string',
                'CacheNodeType'                => 'string',
                'Duration'                     => 'string',
                'ProductDescription'           => 'string',
                'OfferingType'                 => 'string',
                'MaxRecords'                   => 100,
                'Marker'                       => 'string',
            )
        );


        return new CloudWatchMonitor();
    }
}