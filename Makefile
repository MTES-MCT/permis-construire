up:
	docker-compose up -d

build:
	docker-compose rm -vsf
	docker-compose down --remove-orphans
	docker-compose build
	docker-compose up -d

down:
	docker-compose down

require:
	docker-compose run php composer require

require-dev:
	docker-compose run php composer require --dev

sh:
	docker-compose run php /bin/sh

tests:
	docker-compose run php bin/phpunit ./tests/

stan:
	docker-compose run php ./vendor/bin/phpstan analyse src --level 7

cs-fixer:
	docker-compose run php ./vendor/bin/php-cs-fixer fix src

cs-check:
	docker-compose run php ./vendor/bin/php-cs-fixer fix src --dry-run --diff

regenerate-entities:
	docker-compose run php bin/console make:entity --regenerate App

composer-install:
	docker-compose run php composer install

install:
	docker-compose run php composer install
	docker-compose run php bin/console doctrine:migrations:migrate