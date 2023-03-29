FROM phpdockerio/php:8.1-fpm
WORKDIR "/app"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        git \ 
        php8.1-mysql \ 
        php8.1-sqlite3 \ 
        php8.1-uuid \ 
        php8.1-xdebug \ 
        php8.1-yaml; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
