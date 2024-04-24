#Etap pierwszy
# Deklaracja obrazu bazowego z node
FROM node:alpine  AS build
# Deklaracja katalogu roboczego
WORKDIR /usr/app
# Deklaracja zmiennej VERSION
ARG VERSION
# Użycie zmiennej VERSION
ENV VERSION=${VERSION}
# Kopiowanie niezbędnych zaleności 
COPY ./package.json ./
# Instalacja tych zaleności 
RUN npm install
# Kopiowanie kodu aplikacji do wewnątrz obrazu
COPY ./app.js ./
# Informacja o porcie wewnętrznym kontenera, 
# na ktorym "nasluchuje" aplikacja
EXPOSE 8090
# Domyśle polecenie przy starcie kontenera 
CMD ["npm", "start"]

# Etap drugi
# Deklaracja obrazu bazowego z nginx
FROM nginx:alpine
# Kopiowanie plików z etapu pierwszego do obrazu z nginx
COPY --from=build /usr/app /usr/share/nginx/html
# Przekazanie zmiennej VERSION do drugiego etapu
ENV VERSION=${VERSION}
# Sprawdzenie dostępności aplikacji
HEALTHCHECK --interval=10s --timeout=1s \
  CMD curl -f http://localhost:8080/ || exit 1
CMD ["nginx", "-g", "daemon off;"]
