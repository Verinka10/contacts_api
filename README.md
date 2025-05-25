
### Установка

    cp .env.example .env
    прописать в .env DB_HOST DB_DATABASE DB_PORT DB_USERNAME DB_PASSWORD
    echo "127.0.0.1 backend.local" >> /etc/hosts


Без docker:

    composer install
    php artisan key:generate
    php artisan migrate
    php artisan serv # {--port 80} или через nginx хоста, конфиг добавить с         docker/nginx/default.conf
    открыть http://backend.local or http://127.0.0.1:8066/  

Через docker:

    прописать в .env DB_HOST=db, DB_HOST_OLD=host.docker.internal если старая бд на хостовой машине
    docker-compose build
    docker-compose exec php-fpm composer install
    docker-compose exec php-fpm php artisan key:generate
    docker-compose exec php-fpm php artisan migrate
    docker-compose up -d
    открыть http://backend.local  or http://127.0.0.1:8066/ 
    
Telegram:

	Создать bot
	Create a Telegram bot with https://telegram.me/BotFather;
	прописать в .env
	TELEGRAM_API_KEY
	TELEGRAM_CHANNEL
	
Test:
	
	docker-compose exec php-fpm php artisan test
    
    
