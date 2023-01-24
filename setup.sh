#!/bin/bash

reset

RED="\e[31m"
GREEN="\e[32m"
WHITE="\e[97m"
ENDCOLOR="\e[0m"

echo -e "
${RED}
██      ██ ██    ██ ███████     ███████ ███████  █████  ██████   ██████ ██   ██
██      ██ ██    ██ ██          ██      ██      ██   ██ ██   ██ ██      ██   ██
██      ██ ██    ██ █████       ███████ █████   ███████ ██████  ██      ███████
██      ██  ██  ██  ██               ██ ██      ██   ██ ██   ██ ██      ██   ██
███████ ██   ████   ███████     ███████ ███████ ██   ██ ██   ██  ██████ ██   ██
${ENDCOLOR}

    [*] Author: Thiago Silva AKA thiiagoms
    [*] E-mail: thiagom.devsec@gmail.com
"

echo -e "=> SetUp containers"
{
    docker-compose up -d
} &> /dev/null

echo -e "=> Install app dependencies"
{
    docker-compose exec app composer install
} &> /dev/null

echo -e "=> Running migrations"
{
    docker-compose exec app cp .env.example .env
    docker-compose exec app php artisan key:generate
    docker-compose exec app php artisan migrate --seed
}  &> /dev/null

echo -e "[*] Listening application on ${GREEN}http://localhost:8000${ENDCOLOR}"
