#!/usr/bin/env bash

mkdir -p ./data/rest/api/s3
#aws s3 describe-events > ./data/rest/api/s3/events.json

mkdir -p ./data/rest/api/dms
aws dms describe-endpoints > ./data/rest/api/dms/endpoints.json
aws dms describe-connections > ./data/rest/api/dms/connections.json
aws dms describe-endpoint-types > ./data/rest/api/dms/endpoint-types.json
aws dms describe-replication-instances > ./data/rest/api/dms/replication-instances.json
aws dms describe-replication-tasks > ./data/rest/api/dms/replication-tasks.json

#vpc
#https://eu-central-1.console.aws.amazon.com/vpc/home?region=eu-central-1#eips:

mkdir -p ./data/rest/api/route53
aws route53 list-health-checks > ./data/rest/api/route53/health-checks.json
aws route53 list-hosted-zones > ./data/rest/api/route53/hosted-zones.json
aws route53 list-traffic-policies > ./data/rest/api/route53/traffic-policies.json
