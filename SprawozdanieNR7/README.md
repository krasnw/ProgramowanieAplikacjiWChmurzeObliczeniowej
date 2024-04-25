## Sprawozdanie nr7


Zbudowanie buildera:
```zsh
docker build create --name lab7builder --driver docker-container --bootstrap
docker build use lab7builder
```

Polecenie do zbudowania obrazu z wykorzystaniem cache, dla architektury amd64 i arm64:
```zsh
docker buildx build --cache-from=type=registry,ref=docker.io/your_Username/labx:cache --cache-to=type=registry,ref=docker.io/your_Username/labx:cache,mode=max -f DockerfileA -t docker.io/your_Username/labx:lab7 --platform linux/amd64,linux/arm64 --push .
```
> Jeśli na koncie dockerhub niema obrazu, który ma być użyty jako cache, to Docker zignoruje parametr `--cache-from` i zbuduje obraz od zera.

Uwaga!
> W poleceniu powyżej należy zmienić `your_Username` na swoje nazwę użytkownika w DockerHub.

Opcja `--cache-from` określa, skąd Docker powinien odczytywać dane cache, a `--cache-to` określa, gdzie Docker powinien zapisywać dane cache.

Parametr mode=max w `--cache-to` oznacza, że Docker będzie zapisywać jak najwięcej danych cache. Jest to przydatne, gdy chcesz zminimalizować czas budowy w przyszłości, ale może zająć więcej miejsca w rejestrze.