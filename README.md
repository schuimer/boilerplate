## Boilerplate for our Laravel based projects
The basis for all our Laravel based projects. Ensuring that we have a common code base and a consistent development environment.


### based on
- Laravel Boilerplate [https://github.com/rappasoft/laravel-boilerplate](https://github.com/rappasoft/laravel-boilerplate)
- extendable with modules [https://github.com/nWidart/laravel-modules](https://github.com/nWidart/laravel-modules)
- shipped with Laravel Homestead (plus phpmyadmin) as a ready-to-run development environment


### set up dev environment with Laravel Homestead
- make sure Vagrant and Virtual Box are installed
- get Homestead: "composer require laravel/homestead --dev"
- install Homestead: "php vendor/bin/homestead make"
- copy Homestead.yaml.example to Homestead.yaml and edit if necessary
- vagrant up
- vagrant ssh to vagrant box
- cd code
- change PHP version to 7.3 by entering "php73"
- run "bash user-customizations.sh" to install phpMyAdmin (this is just a workaround because the script is not executed while provisioning Vagrant - we need to check that)


### install boilerplate on dev enviroment
- copy .env.example to .env and edit if necessary
- run "composer install"
- run "yarn"
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
- npm run development
- phpunit
- php artisan storage:link


### add to etc/hosts
Add the following entries to your hosts file

192.168.10.10 homestead.test
192.168.10.10 phpmyadmin.test

On MacOS you can do so in the Terminal app:
- edit hosts file "sudo nano /etc/hosts"
- clear hosts cache "sudo killall -HUP mDNSResponder"


### Boilerplate App
Open the boilerplate app in your browser "http://homestead.test" with the following demo credentials:

**Admin:** admin@admin.com  
**Password:** secret

**User:** user@user.com  
**Password:** secret


### phpMyAdmin
phpmyadmin can be reached at "http://phpmyadmin.test" with the following demo credentials:

**User:** homestead
**Password:** secret


### Mailhog
Mailhog can be reached at http://192.168.10.10:8025/


### License

MIT: [http://anthony.mit-license.org](http://anthony.mit-license.org)
