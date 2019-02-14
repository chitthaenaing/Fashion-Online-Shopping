# Dockerfile
FROM nimmis/apache-php5

MAINTAINER ChitThaeNaing <chitthaenaing@gmail.com>

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

ENV MYSQL_ROOT_PASSWORD=''
ENV MYSQL_ROOT_USER=root

EXPOSE 80
EXPOSE 443

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]