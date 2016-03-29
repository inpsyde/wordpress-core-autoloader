# How to contribute

If you have just a question about this or want to take part in the discussion, you can do this at the
[WordPress core ticket](https://core.trac.wordpress.org/ticket/36335) or use the 
[issue section](https://github.com/inpsyde/wordpress-core-autoloader) on Github. Feel free to open a new issue.

## Working with this repository

To work and contribute to the repository, you need these four things:
 * A [github account](https://github.com/join)
 * [git](https://git-scm.com/) itself
 * [composer](https://getcomposer.org/)
 * [phpunit](https://phpunit.de/)

## Installing dependencies and running tests

After cloning the repository you have to install the required dependencies with the following command.

```
$ composer install --prefer-dist
```

Composer will install everything in the directory `vendor/`. Now you can run the phpunit tests with this:

```
$ ./vendor/bin/phpunit 
```
