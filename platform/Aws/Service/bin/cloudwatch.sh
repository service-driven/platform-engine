#!/usr/bin/env bash

aws cloudwatch describe-alarms > corporate/AwsPlatform/data/rest/api/cloudwatch/alarms.json
aws cloudwatch describe-alarm-history > corporate/AwsPlatform/data/rest/api/cloudwatch/alarm-history.json
aws cloudwatch list-metrics --namespace AWS/ElastiCache > corporate/AwsPlatform/data/rest/api/cloudwatch/metrics.json


#aws cloudwatch describe-alarms-for-metric > corporate/AwsPlatform/data/rest/api/cloudwatch/alarms-for-metric.json

#GetTypeCmds
#Reclaimed
#IsMaster
#StringBasedCmds
#SaveInProgress
#CacheHits
#CurrItems
#Evictions
#ReplicationBytes
#ReplicationLag
#CurrConnections




aws cloudwatch get-metric-statistics --namespace AWS/ElastiCache --metric-name CacheHits --period 60 --statistics Maximum Minimum Average --start-time 2016-12-02T15:00:00Z --end-time 2016-12-02T16:00:00Z

aws cloudwatch get-metric-statistics \
    --namespace AWS/EC2 \
    --metric-name CPUUtilization \
    --start-time 2016-12-01T23:18:00 \
    --end-time 2016-12-02T23:18:00 \
    --period 3600 \
    --statistics Maximum