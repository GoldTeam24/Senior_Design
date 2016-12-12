# How to get set up

##clone the codebase
```
#!bash
$ git clone https://bitbucket.org/designseminar/prerequisite-knowledge ~/Code/Laravel
```

##start vagrant
```
#!bash
$ vagrant up
```
## if you cannot connect to vagrant
* open virtual box
* open the Networking tab of your box
* check "Cable Connected" box

## ssh into your vagrant box
```
#!bash
$ vagrant ssh
```
## navigate to your Laravel directory
```
#!bash
$ cd ~/Code/Laravel
```
## install composer
```
#!bash
$ composer install
```
## generate key
```
#!bash
$ cp .env.example .env
$ php artisan key:generate
```