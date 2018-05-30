
FROM ubuntu:18.04
LABEL description="Imagen para correr el generador de excusas"
RUN  apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -y apache2 php libapache2-mod-php php-xml git
RUN git clone https://github.com/jci/excusas /var/www/html/excusas/
EXPOSE 80
ENV LogLevel "info"
USER "root"
ENTRYPOINT ["/usr/sbin/apache2ctl","-D", "FOREGROUND"]
