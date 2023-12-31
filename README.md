# Процесс распаковки

#### 1. Установить docker и docker-compose

[Скачать и установить докер](https://docs.docker.com/desktop/)

#### 2. Скачать и распаковать репозиторий

#### 3. Открыть консколь в корневой директории проекта и выполнить ```docker-compose up```

#### 4. Инициация

открыть новую консоль в корневой директории проекта и выполнить

```
docker exec -it php81 bash
cd back
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
exit
```

#### 4. Фронт доступен по адресу [localhost](http://localhost/)

#### 5. API доступно по адресу [localhost/api](http://localhost/api/)