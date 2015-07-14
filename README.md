## HelloFresh Framework :D

The application shipped with this readme implements all the requirements from the requirement doc.

## Dependencies

- PHP 5.3 or greater
- MySQL 5.6 or MariaDB
- composer

## 3rd party libraries used

- Hoa Router - http://hoa-project.net
- Aura.DI container - https://github.com/auraphp/Aura.Di
- Idiorm and Paris - http://j4mie.github.io/idiormandparis/
- Respect Validation - respect.li/Validation
- LibMigration - http://kohkimakimoto.github.io/lib-migration/

## Installation

- Extract the files
- Run a composer install
- update DB configuration
- Run DB migrations
    - cd src/config
    - Run : ../../vendor/bin/phpmigrate up


## Approach

- Custom MVC framework implemented with the components used.
- Business Logic abstracted into Repository implementation
- Controllers depends on contracts hence giving us the flexibility to swap implementations easily.

## Improvements

- Figure out a better way to handle the DI container access within the controllers, current implementation depends on
$_SESSION variable to share the DI container.

