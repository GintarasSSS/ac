#!/bin/bash

docker-compose down

if [[ ! -d ./src ]]
then
  mkdir "src"
  docker-compose run --rm composer create-project --prefer-dist laravel/laravel .
fi

docker-compose up -d --build php mysql

docker-compose run --rm php bash -c "chown -R www-data:www-data ./*"
