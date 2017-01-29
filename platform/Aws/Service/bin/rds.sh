#!/usr/bin/env bash

mkdir -p ./data/rest/api/rds
#aws rds describe-events > ./data/rest/api/rds/events.json
#aws rds describe-event-categories > ./data/rest/api/rds/event-categories.json
#aws rds describe-event-subscriptions > ./data/rest/api/rds/event-subscriptions.json
#
#aws rds describe-db-clusters > ./data/rest/api/rds/db-clusters.json
aws rds describe-db-snapshots > ./data/rest/api/rds/db-snapshots.json


#aws rds describe-db-instances > ./data/rest/api/rds/db-instances.json
#
#mkdir -p ./data/rest/api/rds/db-log-files
#aws rds describe-db-log-files --db-instance-identifier ds1ieanh8d0xvqv > ./data/rest/api/rds/db-log-files/ds1ieanh8d0xvqv.json
#aws rds describe-db-log-files --db-instance-identifier dseoc2lmztmbrq > ./data/rest/api/rds/db-log-files/dseoc2lmztmbrq.json
#aws rds describe-db-log-files --db-instance-identifier dss6i7jru9jenq > ./data/rest/api/rds/db-log-files/dss6i7jru9jenq.json
#aws rds describe-db-log-files --db-instance-identifier dsuraz8lnbjyxh > ./data/rest/api/rds/db-log-files/dsuraz8lnbjyxh.json

aws rds download-db-log-file-portion --db-instance-identifier ds1ieanh8d0xvqv --log-file-name error/postgresql.log.2016-11-26-23