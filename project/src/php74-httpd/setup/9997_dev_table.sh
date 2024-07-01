#!/usr/bin/env bash

set -ex

pushd example-app
  npx nodemon --ext php -w "./database/**" --exec 'php artisan migrate:fresh --seed'
