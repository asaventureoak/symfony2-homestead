# Symfony2 Laravel's Homestead Adaptation

This project is a fork of the [Laravel](http://laravel.com/) Homestead local development environment adapted to the [Symfony2](http://symfony.com/) framework.

## Requirements

The Homestead requires [Vagrant](http://vagrantup.com), [Virtualbox](http://virtualbox.org) to work.

## Installation

### Install composer

To install the Symfony2-Homestead you will need [Composer](http://getcomposer.org).

In Linux or Mac OSx you can install via terminal:

```
curl -sS https://getcomposer.org/installer | php
```

Then you can move to a global path so it's accessible system wide.

```
sudo mv composer.phar /usr/bin/composer
```

### Install Symfony2-Homestead with composer

```
composer global require ventureoak/symfony2-homestead
```
If it's the first time you use composer globaly, um should ensure the ~/.composer/vendor/bin is in your Path 

## Usage

### Initialization

To initialize a Homestead machine use the **init** option.

```
homestead init
```

### Configuration

To configure your environment use the **edit** option.

```
homestead edit
```

#### Parameters

##### ip

The ip address of the Homestead machine to your system.

##### memory

The ammount of RAM memory of the virtual machine.

#### cpus

The number of virtual CPU's of the virtual machine.

#### authorize

The SSL key to allow the communication between virtual and host machines.

#### folders

The folder mapping from your host machine **(map)** to be available on the virtual machine **(to)**.

#### sites

The sites you want to configure on the virtual machine. The configuration will be executed where you run the **homestead provision** or **homestead up --provision** commands.

#### databases

The databases you want to automatically create on the virtual machine.

#### variables

The environment variables you want available on the virtual machine.

### Set your SSL key

To allow the access over SSH you must set your SSL key.

```
ssh-keygen -t rsa -C "you@domain.com"
```

#### Example

This is an example of the implementation of a Symfony2 application in the **symfony.app** url.

1. Associate the domain to the **/etc/hosts** file to the **192.168.10.10** IP address

```
(...)
192.168.10.10   symfony.app
(...)
```

2. Edit the homestead to make the new application available for your host system
```
---
ip: "192.168.10.10"
memory: 2048
cpus: 1

authorize: ~/.ssh/id_rsa.pub

keys:
    - ~/.ssh/id_rsa

folders:
    - map: ~/Code
      to: /home/vagrant/Code

sites:
    - map: symfony.app
      to: /home/vagrant/Code/symfony.app/web

databases:
    - homestead

variables:
    - key: APP_ENV
      value: local
```

### Commands

#### Initialize the structure

```
homestead init
```

#### Edit the configuration

```
homestead edit
```

#### Start the machine

```
homestead up
```

#### Stop the machine

```
homestead halt
```

#### Provision the configuration

```
homestead provision
```

#### Access te machine over SSH

```
homestead ssh
```

### Official documentation

The official Laravel local development environment.

Official documentation [is located here](http://laravel.com/docs/homestead?version=4.2).
