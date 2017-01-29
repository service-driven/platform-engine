#!/usr/bin/env bash
git clone ssh://git@git.simplicity.ag:7999/one/one.git one/one

# (vpn!!)
composer install

cd vm
vagrant up
vagrant ssh

#  shrinked
/vagrant/scripts/dbupdate.sh