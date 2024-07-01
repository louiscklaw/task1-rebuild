@REM # docker compose kill
@REM # docker compose down

docker compose up -d --build

@REM # docker compose logs -f
docker compose exec -it php74-httpd bash
