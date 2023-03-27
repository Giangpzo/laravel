migrate:
	# include docker-compose.yaml file first to merge some config (ex: network)
	sudo docker compose -f ./environment-setup/docker-composes/docker-compose.yaml -f ./environment-setup/docker-composes/docker-compose.artisan.yaml run --rm artisan migrate

clear-cache:
	sudo docker compose -f ./environment-setup/docker-composes/docker-compose.yaml -f ./environment-setup/docker-composes/docker-compose.artisan.yaml run --rm artisan cache:clear

maintenance-on:
	sudo docker compose -f ./environment-setup/docker-composes/docker-compose.yaml -f ./environment-setup/docker-composes/docker-compose.artisan.yaml run --rm artisan down --render="maintenance"

maintenance-off:
	sudo docker compose -f ./environment-setup/docker-composes/docker-compose.yaml -f ./environment-setup/docker-composes/docker-compose.artisan.yaml run --rm artisan up

artisan-sh:
	sudo docker compose -f ./environment-setup/docker-composes/docker-compose.yaml -f ./environment-setup/docker-composes/docker-compose.artisan.yaml run --rm --entrypoint='' artisan sh

artisan-sh-refresh:
	sudo docker compose -f ./environment-setup/docker-composes/docker-compose.yaml -f ./environment-setup/docker-composes/docker-compose.artisan.yaml run --build --rm --entrypoint='' artisan sh