#!/usr/bin/env bash

# Start your registry:
docker run -d -p 5000:5000 --restart=always --name registry registry:2

# Get any image from the hub and tag it to point to your registry:
docker pull ubuntu
docker tag ubuntu localhost:5000/ubuntu

# push to registry
docker push localhost:5000/ubuntu

# then pull it back from your registry
docker pull localhost:5000/ubuntu



# Registry notifications
#https://docs.docker.com/registry/notifications/

#https://console.aws.amazon.com/cloudformation/home?#/stacks/new?stackName=DockerDatacenter&templateURL=https://s3-us-west-2.amazonaws.com/ddc-on-aws-public/aws/aws-v1.12.3-cs4-beta12-ddc.json



# Registry REST API
#https://docs.docker.com/registry/spec/api

