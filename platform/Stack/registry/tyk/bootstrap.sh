#!/usr/bin/env bash

# Install Mongo and Redis
sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv 7F0CEB10
echo 'deb http://downloads-distro.mongodb.org/repo/ubuntu-upstart dist 10gen' | sudo tee /etc/apt/sources.list.d/mongodb.list
sudo apt-get update
sudo apt-get install -y mongodb-org redis-server vim curl

# The environment is ready, now to install Tyk!
curl -s https://packagecloud.io/install/repositories/tyk/tyk-gateway/script.deb.sh | sudo bash
curl -s https://packagecloud.io/install/repositories/tyk/tyk-dashboard/script.deb.sh | sudo bash
curl -s https://packagecloud.io/install/repositories/tyk/tyk-pump/script.deb.sh | sudo bash
sudo apt-get install tyk-gateway tyk-dashboard tyk-pump

# Configure Tyk Gateway
sudo /opt/tyk-gateway/install/setup.sh --dashboard=http://tyk.local:3000 --listenport=8080 --redishost=localhost --redisport=6379 --domain=""

# Configure Tyk Dashboard
sudo /opt/tyk-dashboard/install/setup.sh --listenport=3000 --redishost=localhost --redisport=6379 --mongo=mongodb://127.0.0.1/tyk_analytics --tyk_api_hostname=$HOSTNAME --tyk_node_hostname=http://localhost --tyk_node_port=8080 --portal_root=/portal --domain="tyk.local"

# Configure Tyk Pump
sudo /opt/tyk-pump/install/setup.sh --redishost=localhost --redisport=6379 --mongo=mongodb://127.0.0.1/tyk_analytics

# Start Tyk Pump and Tyk dashboard
sudo service tyk-dashboard start
sudo service tyk-pump start

