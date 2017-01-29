#!/usr/bin/env bash

docker run -d --name=api-umbrella -p 4080:80 -p 40443:443 -v $PWD/config:/etc/api-umbrella nrel/api-umbrella
