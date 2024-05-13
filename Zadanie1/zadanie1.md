## LABORATORIUM: Programowanie Aplikacji w Chmurze Obliczeniowej

### Zadanie 1
---
### Aplikacja  
- Program serwera jest zrealizowany za powocą jęzuka oprogramowania JavaScript.  
[Kod aplikacji](app/index.js)
### Obraz  
- Plik [Dockerfile](Dockerfile) który pozwoli na zbudowanie obrazu kontenera realizującego funkcjonalność opisaną w punkcie 1.
### Komendy
- Najpierw trzeba zbudować builder:  
```zsh
docker build create --name zadanie1builder --driver docker-container --bootstrap
docker build use zadanie1builder
```

- Polecenie do zbudowania obrazu, z pobraniem cache z dockerhub, dla architektury amd64 i arm64:  
> W poleceniach należy zmienić `your_Username` na własną nazwę użytkownika w DockerHub.  
```zsh
docker buildx build --cache-from=type=registry,ref=docker.io/prayforstpetersburg1991/zadanie1:cache --cache-to=type=registry,ref=docker.io/your_Username/zadanie1:cache,mode=max -f Dockerfile -t docker.io/your_Username/zadanie1:spr --platform linux/amd64,linux/arm64 --push .
```  
- Uruhomienie kontenera:  
```zsh
docker pull your_Username/zadanie1:spr && docker run -p 3000:3000 your_Username/zadanie1:spr
```
- Po uruchomieniu kontenera, terminal wyświetla logi