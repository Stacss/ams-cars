# Тестовый проект AMS

Описание вашего проекта. Объясните, что делает ваш проект и почему он полезен.

## Установка

Следуйте этим шагам, чтобы установить и настроить проект локально.

### Предварительные требования

Убедитесь, что у вас установлены следующие программы:

- Git
- Docker
- Docker Compose
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

### Запуск миграций и сидов

6. Запустите миграции для создания таблиц в базе данных и наполните их начальными данными:

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
