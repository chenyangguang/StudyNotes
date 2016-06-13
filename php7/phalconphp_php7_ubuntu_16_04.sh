#!/bin/bash

# PhalconPhp with PHP7 installation on ubuntu:16.04

sudo apt-get update 

sudo apt-get install -y php7.0-fpm \
    	php7.0-cli \
    	php7.0-curl \
    	php7.0-gd \
    	php7.0-intl \
	php7.0-pgsql \
	curl \
	vim \
	wget \
	git 

# For zephir installtion; the following packages are needed in Ubuntu:
sudo apt-get install -y gcc make re2c libpcre3-dev php7.0-dev build-essential php7.0-zip

# Install composer
sudo curl -sS http://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Install zephir
sudo composer global require "phalcon/zephir:dev-master" 

# Install phalcon dev tool 
sudo composer require "phalcon/devtools" -d /usr/local/bin/
sudo ln -s /usr/local/bin/vendor/phalcon/devtools/phalcon.php /usr/bin/phalcon


# Install phalconphp with php7
sudo git clone https://github.com/phalcon/cphalcon.git -b 2.1.x --single-branch
cd cphalcon/
sudo ~/.composer/vendor/bin/zephir build --backend=ZendEngine3
sudo echo "extension=phalcon.so" >> /etc/php/7.0/fpm/conf.d/20-phalcon.ini
sudo echo "extension=phalcon.so" >> /etc/php/7.0/cli/conf.d/20-phalcon.ini

# some additional php settings if you care
sudo sed -i "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g" /etc/php/7.0/cli/php.ini 
sudo sed -i "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g" /etc/php/7.0/fpm/php.ini
sudo sed -i "s/memory_limit = 128M/memory_limit = 256M /g" /etc/php/7.0/fpm/php.ini

# restart php-fpm
sudo service php7.0-fpm restart
 @Lewiscowles1986
