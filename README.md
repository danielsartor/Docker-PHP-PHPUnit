# Docker-PHP-PHPUnit

## Info
Default project for running PHP and PHPUnit on Docker.

## Alias
- `alias dcr='docker-compose run'`  
_This is not mandatory, but in case you use it, you can run "docker-compose run" commands just by typing "dcr"_

## Commands
- Update dependencies: `docker-compose run composer update`
- Startup the project: `docker-compose up -d fpm nginx`
- Run Tests: `docker-compose run phpunit`