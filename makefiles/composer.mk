init-code:
	sudo docker compose -f ./docker-composes/docker-compose.yaml -f ./docker-composes/docker-compose.composer.yaml run --rm composer create-project laravel/laravel .

composer:
	sudo docker compose -f ./docker-composes/docker-compose.yaml -f ./docker-composes/docker-compose.composer.yaml run --rm --entrypoint='' composer sh