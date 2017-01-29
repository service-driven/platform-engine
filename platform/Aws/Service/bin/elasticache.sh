#!/usr/bin/env bash

aws elasticache describe-cache-clusters --show-cache-node-info > corporate/AwsPlatform/data/rest/api/elasticache/cache-clusters.json
aws elasticache describe-cache-engine-versions > corporate/AwsPlatform/data/rest/api/elasticache/cache-engine-versions.json
aws elasticache describe-cache-parameter-groups  > corporate/AwsPlatform/data/rest/api/elasticache/cache-parameter-groups.json
aws elasticache describe-cache-parameters --cache-parameter-group-name default.redis2.8 > corporate/AwsPlatform/data/rest/api/elasticache/cache-parameters.json

#aws elasticache describe-cache-security-groups > corporate/AwsPlatform/data/rest/api/elasticache/cache-security-groups.json
aws elasticache describe-cache-subnet-groups > corporate/AwsPlatform/data/rest/api/elasticache/cache-subnet-groups.json
aws elasticache describe-engine-default-parameters --cache-parameter-group-family redis2.8  > corporate/AwsPlatform/data/rest/api/elasticache/engine-default-parameters.json

aws elasticache describe-events > corporate/AwsPlatform/data/rest/api/elasticache/events.json

aws elasticache describe-replication-groups > corporate/AwsPlatform/data/rest/api/elasticache/replication-groups.json

aws elasticache describe-reserved-cache-nodes > corporate/AwsPlatform/data/rest/api/elasticache/reserved-cache-nodes.json
aws elasticache describe-reserved-cache-nodes-offerings > corporate/AwsPlatform/data/rest/api/elasticache/reserved-cache-nodes-offerings.json

aws elasticache describe-snapshots > corporate/AwsPlatform/data/rest/api/elasticache/snapshots.json

#aws elasticache list-allowed-node-type-modifications > corporate/AwsPlatform/data/rest/api/elasticache/allowed-node-type-modifications.json



aws elasticache copy-snapshot \
    --source-snapshot-name automatic.my-redis-primary-2016-06-27-03-15 \
    --target-snapshot-name my-exported-backup \
    --target-bucket my-s3-bucket

