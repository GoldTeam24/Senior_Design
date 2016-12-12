# How to get set up

if you haven't already, follow the steps to set up your vagrant box [here](https://bitbucket.org/designseminar/pk-virtual-box)
##clone the codebase
```
#!bash
$ git clone https://bitbucket.org/designseminar/prerequisite-knowledge ~/Code/Laravel
```

##start vagrant
```
#!bash
$ cd ~/Homestead
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