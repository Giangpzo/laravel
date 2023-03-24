migrate:
	# include docker-compose.yaml file first to merge some config (ex: network)
	sudo docker compose -f ./docker-composes/docker-compose.yaml -f ./docker-composes/docker-compose.artisan.yaml run --rm artisan migrate

clear-cache:
	sudo docker compose -f ./docker-composes/docker-compose.yaml -f ./docker-composes/docker-compose.artisan.yaml run --rm artisan cache:clear