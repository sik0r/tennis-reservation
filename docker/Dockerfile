FROM php:8-apache
LABEL name = "tennis_web"

RUN apt-get clean
RUN apt-get update -y

RUN apt-get install git -y

RUN apt-get install -y \
        libzip-dev \
        zip 

RUN apt-get install -y nano libpng-dev mc libonig-dev
RUN docker-php-ext-install pdo_mysql mysqli mbstring zip

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer

RUN a2enmod expires rewrite
ADD tennis.local.conf /etc/apache2/sites-available/tennis.local.conf
RUN a2ensite tennis.local.conf

RUN service apache2 restart
