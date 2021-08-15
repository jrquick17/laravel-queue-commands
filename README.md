# laravel-queue-commands #

[![Latest Version](https://img.shields.io/github/release/jrquick/laravel-command-queues.svg?style=flat-square)](https://github.com/jrquick/laravel-command-queues/releases)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/jrquick/laravel-command-queues/run-tests?label=tests)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/jrquick/laravel-command-queues.svg?style=flat-square)](https://packagist.org/packages/jrquick/laravel-command-queues)

![](example.gif)

## Index ##

* [About](#about)
* [Setup](#setup)
* [Usage](#usage)
* [Functionality](#functionality)
* [Contributing](#contributing)
* [Issues](#issues)
* [Release](#release)

## About ## 

Helpful Laravel 7 and 8 commands to help manage the queue from command line.

* Visit [my website](https://jrquick.com) for other cool projects!

## Setup ##

### Install ###

```
composer require jrquick/laravel-queue-commands
```

## Functionality ##

* `php artisan queue:count` - Count the number of items in the queue(s). 
  * --queue - CSV of queues to be counted
* `php artisan queue:test` - Test the queue(s).
  * --queue - CSV of queues to test
  * --delay - How long to delay each test
  * --repeat - The number of tests
  * --ttl - Time to execute the test jobs
* `php artisan queue:track` - Visually track the items in the queue.
  * --queue - CSV of queues to be tracked

## Contributing ##

### Thanks ###

* [jrquick17](https://github.com/jrquick17)

## Issues ##

If you find any issues feel free to open a request in [the Issues tab](https://github.com/jrquick17/ng-speed-test/issues). If I have the time I will try to solve any issues but cannot make any guarantees. Feel free to contribute yourself.

## Release ##

### Update Version ###
    
* Update version in `composer.json` file following [Semantic Versioning (2.0.0)](https://semver.org/).

### Test ###

* 

### Release ###

* 

#### Update Changelog ####

* Add updates to `CHANGELOG.md` in root.
