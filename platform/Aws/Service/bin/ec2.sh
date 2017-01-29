#!/usr/bin/env bash

mkdir -p ./data/rest/api/ec2
aws ec2 describe-instances > ./data/rest/api/ec2/instances.json