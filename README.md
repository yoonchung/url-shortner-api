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

## Usage
### API
- POST to http://localhost:8080/api/v1/url/
Will return JSON with a short URL or errors depending on `url=<longURL>`
- GET to http://localhost:8080/api/v1/url/<shortURL>
Will show the URL that the app is redirecting to
- GET to http://localhost:8080/api/v1/url/top
will return JSON with the top 100 URLs

### Web
- http://localhost:8080/url/
Form for inputting URLs into the system
- http://localhost:8080/url/<shortURL>
Will redirect to the long URL depending on `url=<shortURL>`
- http://localhost:8080/url/top
View for the Top 100 most frequently accessed URLs

## Challenges
Reviewing and researching how to effectively generating shorURL and designing the app with scalability in mind.
Also, building docker container from scratch with necessary components and setting it up.

## Reasoning
Created docker compose container for portability and ease of use.
Changed API endpoint to maintain simplity and compatibility in the event of future revisioning.
Implemented base62 encoding and decoding in generating 7-byte-long shorURL to avoid hash collision, minimize database call and serve urls up to 62^7.

## Future Improvements
Most importantly, it would be a great learning opportunity to make this app more scalable by adding more docker container, seperating API and web client, and etc.
Also if I had more time I would try to use JsonResource class for API, clean up code a little more, and finish NSFW flag.
