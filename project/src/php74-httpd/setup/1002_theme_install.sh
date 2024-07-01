#!/usr/bin/env bash

set -ex

pushd example-app
    # Unzip the downloaded archive
    # Copy and paste argon-dashboard-laravel-master folder in your projects folder. Rename the folder to your project's name
    # In your terminal run composer install
    # Copy .env.example to .env and updated the configurations (mainly the database configuration)
    # In your terminal run php artisan key:generate
    # Run php artisan migrate --seed to create the database tables and seed the roles and users tables
    # Run php artisan storage:link to create the storage symlink (if you are using Vagrant with Homestead for development, remember to ssh into your virtual machine and run the command from there).
