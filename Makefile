up:
	docker-compose up -d

build:
	docker-compose rm -vsf
	docker-compose down -v --remove-orphans
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

test:
	docker-compose run php ./vendor/bin/phpunit ./tests/

test-file:
	docker-compose run php ./vendor/bin/phpunit ./tests/ --group $(FILE)

stan:
	docker-compose run php ./vendor/bin/phpstan analyse $(FILE) --level 7

cs-fixer:
	docker-compose run php ./vendor/bin/php-cs-fixer fix $(FILE)

regenerate-entities:
    docker-compose run php bin/console make:entity --regenerate App
