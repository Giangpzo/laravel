# makefile tutorial
# https://makefiletutorial.com/#include-makefiles

OTHER_MAKE_FILES = ./makefiles/*
include $(OTHER_MAKE_FILES)

up:
	sudo docker compose -f ./docker-composes/docker-compose.yaml up -d

down:
	sudo docker compose -f ./docker-composes/docker-compose.yaml down

