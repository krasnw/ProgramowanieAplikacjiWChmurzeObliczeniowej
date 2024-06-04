# Sprawozdanie nr 10

Do utworzenia sieci mostkowej skorzystalem z polecenia:
```bash
docker network create --driver=bridge --subnet=172.40.20.0/24 lab10net
```

## Tworzenie volumenów

Utworzenie wolumenu ze stroną htmlową:
```bash
docker volume create htmlvol

docker run -d --name tempcontainer -v htmlvol:/var/www/html nginx:latest

docker cp ~/path/to/index.html tempcontainer:/var/www/html/index.html

docker stop tempcontainer && docker rm tempcontainer
```
W tym kroku utworzylem kontener tymczasowy, który zapisuje pliki w wolumenie htmlvol. Następnie zatrzymałem i usunąłem kontener.  
Jako wynik otrzymalem wolumen z plikiem index.html.

## Utworzenie kontenerów

W trakcie tworzenia kontenerów, skorzystałem z wcześniej utworzonego wolumena.  
"htmlvol" z plikiem index.html oraz wolumenów typu bind, do zapisywania logów.

Kontener web1:
```bash
docker run -d --name web1 --network lab10net -p 8081:80 -v htmlvol:/usr/share/nginx/html:ro --mount type=bind,source=/path/to/lab10/web1log,target=/var/log/nginx nginx:latest
```
Kontener web2:
```bash
docker run -d --name web2 --network lab10net -p 8082:80 -v htmlvol:/usr/share/nginx/html:ro --mount type=bind,source=/path/to/lab10/web2log,target=/var/log/nginx nginx:latest
```
Kontener web3:
```bash
docker run -d --name web3 --network lab10net -p 8083:80 -v htmlvol:/usr/share/nginx/html:ro --mount type=bind,source=/path/to/lab10/web3log,target=/var/log/nginx nginx:latest
```