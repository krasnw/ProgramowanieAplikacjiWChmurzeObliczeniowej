const http = require('http');
const os = require('os');
const version = process.env.VERSION || "1.0.0";

const requestHandler = (request, response) => {
  response.end(`Adres IP serwera: ${request.connection.remoteAddress}, Nazwa serwera: ${os.hostname()}, Wersja aplikacji: ${version}`);
}

const server = http.createServer(requestHandler);

server.listen(8080, (err) => {
  if (err) {
    return console.log('Wystąpił błąd: ', err);
  }
  console.log(`Serwer działa na porcie 8080`);
});


