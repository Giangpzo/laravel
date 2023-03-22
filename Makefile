init-code:
	sudo docker compose -f ./docker-composes/docker-compose.composer.yaml run --rm composer create-project laravel/laravel .

up:
	sudo docker compose -f ./docker-composes/docker-compose.yaml up -d

down:
	sudo docker compose -f ./docker-composes/docker-compose.yaml down

