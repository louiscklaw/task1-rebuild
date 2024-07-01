#!/usr/bin/env bash

set -ex

rm -rf example-app

sleep 1

composer create-project laravel/laravel example-app

sleep 1

pushd example-app
    sed -i 's/DB_HOST=127.0.0.1/DB_HOST=mysql/' .env
    sed -i 's/DB_USERNAME=root/DB_USERNAME=project/' .env
    sed -i 's/DB_PASSWORD=/DB_PASSWORD=project/' .env

