## Getting Started with EPGP. 

EPGP is a standard Laravel project, so if you have an existing development environment for Laravel & Composer, it should plug right in.

Alternatively, I've also included a Vagrant environment.  To use Vagrant, you will need to install the following software. 

- [Vagrant](http://www.vagrantup.com/)
- [VirtualBox](https://www.virtualbox.org/wiki/Downloads)

Once those are installed, run "vagrant up" from within your local EPGP folder.  After some time, you should see the following. 

    ==============================================================================
    I am done! check it out: http://localhost:80
    I am done! check it out: https://localhost:443
    
    I am designed to respond to any domain you point at me.
    You can connect to MySQL on localhost:3306, User: root, Password: rootpass
    For security, it is highly recommended to change the default password.
    ==============================================================================

 Please note, that by default, vagrant is configured to bind itself to ports 80, 443, and 3306.  If you have software already bound to those ports, you will most likely receive an error. 

You can change what ports Vagrant is using by modifying the bottom of vagrantfile. 

      config.vm.network :forwarded_port, guest: 80, host: 80 # Web Port
      config.vm.network :forwarded_port, guest: 443, host: 443 # SSL Web Port
      config.vm.network :forwarded_port, guest: 3306, host: 3306 # MySQL Port


## Laravel PHP Framework


[![Latest Stable Version](https://poser.pugx.org/laravel/framework/version.png)](https://packagist.org/packages/laravel/framework) [![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.png)](https://packagist.org/packages/laravel/framework) [![Build Status](https://travis-ci.org/laravel/framework.png)](https://travis-ci.org/laravel/framework) [![License](https://poser.pugx.org/laravel/framework/license.png)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
