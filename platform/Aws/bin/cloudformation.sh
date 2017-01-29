#!/usr/bin/env bash

mkdir -p ./data/rest/api/cloudformation
aws cloudformation describe-stacks > ./data/rest/api/cloudformation/stacks.json

mkdir -p ./data/rest/api/cloudformation/stack/DEV-SHOP-CLOUDFRONT-STATIC-B2C
aws cloudformation describe-stack-events --stack-name DEV-SHOP-CLOUDFRONT-STATIC-B2C > ./data/rest/api/cloudformation/stack/DEV-SHOP-CLOUDFRONT-STATIC-B2C/events.json
aws cloudformation list-stack-resources --stack-name DEV-SHOP-CLOUDFRONT-STATIC-B2C > ./data/rest/api/cloudformation/stack/DEV-SHOP-CLOUDFRONT-STATIC-B2C/resources.json
aws cloudformation get-template --stack-name DEV-SHOP-CLOUDFRONT-STATIC-B2C > ./data/rest/api/cloudformation/stack/DEV-SHOP-CLOUDFRONT-STATIC-B2C/template.json