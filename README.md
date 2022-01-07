# url-shortner-api
URL shortener API and web client.

## Install
Clone this repo
``` bash
git clone https://github.com/yoonchung/url-shortner-api.git
```

Install with [docker-compose] (https://docs.docker.com/compose/install/).
``` bash
cd url-shortner-api
docker-compose up -d --build
```

Use exmaple env file as necessary.
``` bash
cp src/.env.example src/.env
```

Initiate php-apache container to install dependencies and initiate database table with sample data.
``` bash
docker-compose exec php-apache /bin/bash
composer install
php artisan migrate:fresh --seed
```

## Usage
### API
- POST to http://localhost:8080/api/v1/url/
Will return JSON with a short URL or errors depending on `url={longURL}`
- GET to http://localhost:8080/api/v1/url/{shortURL}
Will show the URL that the app is redirecting to
- GET to http://localhost:8080/api/v1/url/top
will return JSON with the top 100 URLs

### Web
- http://localhost:8080/url/
Form for inputting URLs into the system
- http://localhost:8080/url/{shortURL}
Will redirect to the long URL depending on `shortURL`
- http://localhost:8080/url/top
View for the Top 100 most frequently accessed URLs
