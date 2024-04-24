## Sprawozdanie 5

### Uwagi 
Dockerfile został stworzony zgodnie z wymaganiami z treści zadania. Ale zbudowany obraz nie spełnia oczekiwań. Jest to spowodowane tym, że nginx nie jest w stanie obsługiwania node.js. Bo nie posiada srodowiska do wykonania JavaScript.
> Aby uzyskać oczekiwany efekt, nginx trzeba skonfigurować tak, aby przekazywał zapytania do serwera node.js. Zrobić rewers proxy.