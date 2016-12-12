# How to get set up
```
#!bash

# clone the codebase
$ git clone https://bitbucket.org/designseminar/prerequisite-knowledge ~/Code/Laravel

# start vagrant
$ vagrant up

# if you cannot connect to vagrant
open virtual box
open the Networking tab of your box
check "Cable Connected" box

# ssh into your vagrant box
$ vagrant ssh

# navigate to your Laravel directory
$ cd ~/Code/Laravel

# install composer
$ composer install

# generate key
$ php artisan key:generate

```