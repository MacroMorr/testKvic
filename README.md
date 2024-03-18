## Технологии
- linux mint/ubuntu 20.4
- php 8.2
- Mysql
- node 20.11.1
- framework laravel 10
- Laradock
- boostrap 5

#### В тестовом проекте есть
- Валидация
- Пагинация

### Установить в папку с проектом Laradock (локальная версия)
``git clone https://github.com/Laradock/laradock.git``

### kvik-dil-test/.env
```dotenv
APP_NAME=Kvik-dil
APP_URL=http://kvik.loc

DB_CONNECTION=mysql  
DB_HOST=mysql  
DB_PORT=3306  
DB_DATABASE=kvik  
DB_USERNAME=kvik  
DB_PASSWORD=kvik
```

### kvik-dil-test/laradock/.env
```dotenv
DATA_PATH_HOST=~/.laradock/data/kvik 

COMPOSE_PROJECT_NAME=kvik-dil

PHP_VERSION=8.2

MYSQL_VERSION=latest  
MYSQL_DATABASE=kvik  
MYSQL_USER=kvik  
MYSQL_PASSWORD=kvik  
MYSQL_PORT=3306  
MYSQL_ROOT_PASSWORD=root  
MYSQL_ENTRYPOINT_INITDB=./mysql/docker-entrypoint-initdb.d
```
### kvik-dil-test/laradock/nginx/sites
##### сделать копию файла laravel.conf.example с названием kvic.loc.conf
отредактировать файл: 
- server_name kvic.loc;
- root /var/www/public;

#### в директории /etc открыть файл hosts
- 127.0.0.1 kvic.loc

#### в директории kvik-dil-test/laradock/

- docker compose up -d nginx mysql phpmyadmin // установка пакетов
- docker compose exec --user=laradock workspace bash // запуск рабочей среды

Пересобрать контейнеры (к примеру если произошли изменения в laradock/.env)
- docker compose build php-fpm workspace

Остановить контейнеры
- docker compose down

команды по проекту выполнять в контейнере (пример laradock@297a04433212:/var/www$)

- composer install
- php artisan migrate
- npm i
- npm install --save @fortawesome/fontawesome-free
- npm run build
