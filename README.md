# DDD and Hexagonal Architecture Application
Training best practices of modern PHP development

## Vagrant
    Debian 8 Vagrant image
    which is preconfigured for testing PHP apps and developing extensions across many versions of PHP.
    https://github.com/rlerdorf/php7dev
    
## Set up the project with Vagrant
    Edit your /etc/hosts file  
    192.168.7.8 training.dev

    curl -sS https://getcomposer.org/installer | php
    php composer.phar install
    
    vagrant up
    vagrant ssh
    
    Edit nginx config. file
    sudo vim /etc/nginx/conf.d/default.conf
    and change root:
    root   /var/www/default/public;

    sudo service nginx reload 
    
    You can run now  the app in your browser: http://training.dev

## Coding Style Guide
    PSR-2 https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md

## Route
    FastRoute - Fast request router for PHP https://github.com/nikic/FastRoute
    
## Service Container (Dependency Injection)
    Small but powerful dependency injection container http://container.thephpleague.com
    
## Template    
    Native PHP template system http://platesphp.com

## Unit testing
    You can run the tests with the command: php bin/phpunit
