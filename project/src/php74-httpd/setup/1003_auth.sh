#!/usr/bin/env bash

set -ex

# rm -rf example-app

# composer create-project laravel/laravel example-app

pushd example-app
  composer require laravel/ui
  php artisan ui bootstrap --auth
  php artisan migrate

  composer require laravel-frontend-presets/argon
  php artisan ui argon

  composer dump-autoload
  php artisan migrate:fresh --seed
