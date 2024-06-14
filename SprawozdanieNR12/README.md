# Sprawozdanie nr 12

### Serwisy 
- **Nginx** - serwer www
- **PHP** - do przetwarzanie skryptów serwerowych
- **MySQL** - baza danych
- **phpMyAdmin** - do zarządzania bazą danych MySQL

### Drzewo katalogowe projektu
```bash
 ├──     Dockerfile  
 ├──     README.md  
 └──     data/ 
 │  └────     test_db.sql  
 ├──     docker-compose.override.yml  
 ├──     docker-compose.yml  
 └──     nginx/ 
 │  └────     conf.d/ 
 │  │  └────     default.conf  
 └──     secrets/ 
 │  ├────     mysql_root_password.txt  
 │  └────     mysql_user_password.txt  
 └──     www/ 
 │  └────     index.php 
```

### Uruchamianie oraz wyłączenie projektu
```bash
docker compose -f docker-compose.yml -f docker-compose.override.yml up -d
docker compose down
```

## Opis działania
Za pomocą atrybutu `depends_on` w pliku `docker-compose.yml` jest określona kolejność uruchamiania kontenerów.  
Kontener `mysql` jest uruchamiany jako pierwszy, a następnie `php` oraz `phpMyAdmin`. Po uruchomieniu kontenera `php` jest uruchamiany kontener `nginx'.  
W ten sposób jest zabezpieczona poprawna kolejność uruchamiania kontenerów.

Do kontenera 'mysql' po uruchomieniu jest importowana baza z katalogu `/data`. Plik z kopią jest podłączany do kontenera `mysql` jako volume.  
Po stronie 'nginx' można sprawdzić połączenie z bazą danych, oraz pobrać dane.  
### Nginx: 
http://localhost:4001/index.php

### phpMyAdmin: 
http://localhost:6001  

> Hasła są przechowywane w katalogu `secrets`. Nie usuwałem tego katalogu z repozytorium, w celu prezentacji działania.
