FROM ubuntu:latest

LABEL org.opencontainers.image.authors="Krasnavitski, s97820@pollub.edu.pl"

RUN apt update && apt install -y apache2

COPY index.html /var/www/html/index.html
COPY port8080.conf /etc/apache2/ports.conf

ENTRYPOINT [ "apachectl" ]
CMD [ "-D", "FOREGROUND" ]

EXPOSE 8080

#