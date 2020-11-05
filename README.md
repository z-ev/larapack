# Larapack

Quick start create package laravel

## Install

### Docker
```bash
cp .env.example .env \
&& docker-compose up --build
```
### Add string host's file
```bash
...
127.0.0.1 larapack.loc www.larapack.loc
127.0.0.1 api.larapack.loc www.api.larapack.loc
```
### Migrate and Seeding
```bash
docker-compose exec php bash
php artisan migrate:fresh --seed
```
## Use
### Docker commands start, stop, restart
```bash
docker-compose <command> && docker-compose logs -f
```
### Docker remote project containers, networks, volumes
```bash
docker-compose down --rmi=all -v
```
