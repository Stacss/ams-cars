# Тестовый проект AMS

Тестовый проект реализации пользовательского интерфейса автомобилей c использованием Laravel и Vue

## Установка

Следуйте этим шагам, чтобы установить и настроить проект локально.

### Предварительные требования

- Git
- Docker
- Docker Compose
- php 8.2
- mysql 8.4
- Node.js и npm

### Клонирование репозитория

1. Клонируйте репозиторий на вашу локальную машину:

    ```bash
    git clone https://github.com/Stacss/ams-cars.git
    cd ams-cars
    ```

### Настройка окружения

2. Скопируйте файл `.env.example` в `.env` и настройте его в соответствии с вашими потребностями:

    ```bash
    cp .env.example .env
    ```

### Запуск Docker
В папке docker храняться образцы настроек для запуска контейнеров с помощью laradock, в частности docker-custom.yml включает в себя все необходимые инструменты.

3. Запустите Docker контейнеры:

```bash
    docker-compose up -d --build
```

4. Войдите в контейнер Workspace:

    ```bash
    docker exec -it {id контейнера} bash
    ```

5. Установите зависимости Node.js:

    ```bash
    npm install
    ```

### Запуск миграций

6. Запустите миграции для создания таблиц в базе данных:

    ```bash
    php artisan migrate
    ```

### Запуск Vite

7. Запустите Vite для сборки фронтенда:

    ```bash
   npm run dev
    ```

### Доступ к проекту

8. Откройте браузер и перейдите по адресу [http://localhost](http://localhost), чтобы увидеть работающий проект.

### Заполнение базы денных

Заполите базу данных марок и моделей авто по командк

```bash
php artisan import:cars
```

Заполнение данными о работе и стоимости
```bash
php artisan db:seed
```
Обновление ссылок картинок
```bash
php artisan update:car-models-img
```

ссылки
- http://localhost/
- http://localhost/car1
- http://localhost/car2
