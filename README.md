# Процесс распаковки

#### 1. Установить docker и docker-compose

[Скачать и установить докер](https://docs.docker.com/desktop/)

#### 2. Скачать и распаковать репозиторий

#### 3. Открыть консколь в корневой директории проекта и выполнить ```docker-compose up```

#### 4. Инициация

открыть новую консоль  и выполнить

```
docker exec -it php82 bash
cd back
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
exit
```

#### 4. Фронт будет доступен по адресу [localhost](http://localhost/)

#### 5. API будет доступно по адресу [localhost/api](http://localhost/api/)
