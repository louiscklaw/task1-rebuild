#!/usr/bin/env bash

set -x

 docker compose kill
 docker compose down

docker compose up -d --build

# docker compose logs -f
docker compose exec -it php74-httpd bash
