#!/usr/bin/env bash

# Fix for https://bugs.launchpad.net/ubuntu/+source/livecd-rootfs/+bug/1561250
if ! grep -q "ubuntu-xenial" /etc/hosts; then
    echo "127.0.0.1 ubuntu-xenial" >> /etc/hosts
fi

# Install dependencies
add-apt-repository ppa:ondrej/php
apt-get update -y
apt-get install -y postgresql-9.5 php-pgsql apache2 git curl php7.0 php7.0-bcmath php7.0-bz2 php7.0-cli php7.0-curl php7.0-intl php7.0-json php7.0-mbstring php7.0-opcache php7.0-soap php7.0-sqlite3 php7.0-xml php7.0-xsl php7.0-zip libapache2-mod-php7.0

# Configure Apache
echo "<VirtualHost *:80>
	DocumentRoot /var/www/app/public
	AllowEncodedSlashes On

	<Directory /var/www/app/public>
		Options +Indexes +FollowSymLinks
		DirectoryIndex index.php index.html
		Order allow,deny
		Allow from all
		AllowOverride All
	</Directory>

	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf
a2enmod rewrite
locale-gen de_DE.UTF-8

service apache2 restart

curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

if ! grep -q "cd /var/www/app" /home/ubuntu/.profile; then
    echo "cd /var/www/app" >> /home/ubuntu/.profile
fi


# Create database

#sudo su - postgres
#psql
#CREATE USER app_user WITH PASSWORD '9]7m@`DsgteAamPPw]MJpX;h7*Ue(6uJWZgd~?(_2M.a[5B!;{+fV=,r4z/ap';
#CREATE DATABASE app;
#GRANT ALL PRIVILEGES ON DATABASE "app" to app_user;
#
