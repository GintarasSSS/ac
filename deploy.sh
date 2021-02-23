#!/bin/bash

minikube start

read -p "Apply Persistent Volume (Y/N)? " -n 1 -r
if [[ $REPLY =~ ^[Yy]$ ]]
then
  echo
  kubectl apply -f=kubernetes/pv.yml
fi

docker build --no-cache -t gintarassova/php-ldk:latest -f dockerfiles/php.dockerfile --build-arg COMPOSER_ENV=--no-dev --build-arg NPM_ENV=prod .
docker build --no-cache -t gintarassova/mysql-ldk:latest -f dockerfiles/mysql.dockerfile .
docker build --no-cache -t gintarassova/artisan-ldk:latest -f dockerfiles/artisan.dockerfile .

docker push gintarassova/php-ldk:latest
docker push gintarassova/mysql-ldk:latest
docker push gintarassova/artisan-ldk:latest

kubectl apply -f=kubernetes/php.yml -f=kubernetes/mysql.yml

docker image rm gintarassova/php-ldk:latest
docker image rm gintarassova/mysql-ldk:latest
docker image rm gintarassova/artisan-ldk:latest

minikube service php-service
