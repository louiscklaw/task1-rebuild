#!/usr/bin/env bash

set -ex

pushd example-app


  if [ -f .env ]; then
      echo ".env file exists."
  else
      echo ".env file does not exist."
      exit 1
  fi

  php artisan migrate:fresh --seed

  php artisan storage:link
  php artisan serve --host 0.0.0.0

