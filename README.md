## Migrate + seed

```sh
$ php artisan migrate:refresh --seed
```

## Install composer packages

```sh
$ composer install
```

## Create and setup .env file

- #### make a copy of .env.example and rename to .env command:
```sh
$ copy .env.example .env
$ php artisan key:generate
```
- #### put database credentials in .env file

## Installation

- #### For deploying the project you can use [Docker](https://www.docker.com/) command:
```sh
docker-compose up -d
```

- #### After that, open the Main Page by navigating to your server address:
```sh
127.0.0.1:80
```
