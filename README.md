## Installation

Requirements:

- [Shell terminal]
- [Git] (https://git-scm.com/downloads)
- [Composer v2.0] (https://getcomposer.org)
- [PHP 7.4 or 8.0+] (https://www.php.net/downloads.php)

Clone the repository

```shell script
git clone https://github.com/Tang8/GuildedRoseRefactoring.git
```

or download it at `https://github.com/Tang8/GuildedRoseRefactoring`

Install all the dependencies using composer

```shell script
cd ./GuildedRoseRefactoring
composer install [or make install]
```

## Dependencies

The project uses composer to install:

- [PHPUnit](https://phpunit.de/)
- [ApprovalTests.PHP](https://github.com/approvals/ApprovalTests.php)
- [PHPStan](https://github.com/phpstan/phpstan)
- [Easy Coding Standard (ECS)](https://github.com/symplify/easy-coding-standard)
- [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer/wiki)

## Testing

PHPUnit is configured for testing, a composer script has been provided. To run the unit tests, from the root of the PHP
project run:

```shell script
composer test [or make test]
```

### Tests with Coverage Report

To run all test and generate a html coverage report run:

```shell script
composer test-coverage [or make coverage] 
```

The test-coverage report will be created in /builds, it is best viewed by opening /builds/**index.html** in your
browser.

### Check Code

To check code, but not fix errors:

```shell script
composer check-cs [or make check-cs]
``` 

### Fix Code

ECS provides may code fixes, automatically, if advised to run --fix, the following script can be run:

```shell script
composer fix-cs [or make fix-cs]
```

## Static Analysis

PHPStan is used to run static analysis checks:

```shell script
composer phpstan [or make phpstan]
```

**Happy coding**!
