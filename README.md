# Docker-PHP-PHPUnit

## Info
Default project for running PHP and PHPUnit on Docker.

## Alias
- `alias phpunit=./vendor/bin/phpunit`
_This is not mandatory, but in case you use it, you can run "./vendor/bin/phpunit" commands just by typing "phpunit"_

## Commands
- Update dependencies: `composer update`
- Startup the project: `docker-compose up -d`
- Run Tests: `phpunit`