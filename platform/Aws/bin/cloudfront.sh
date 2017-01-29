#!/usr/bin/env bash

mkdir -p ./data/rest/api/cloudfront
aws cloudfront list-distributions > ./data/rest/api/cloudfront/distributions.json