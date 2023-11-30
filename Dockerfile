FROM php:8.2-apache
RUN apt-get update
RUN apt-get install -y --no-install-recommends
RUN docker-php-ext-install mysqli pdo pdo_mysql

# RUN pecl install redis;
# RUN pecl install mongodb;
# RUN pecl install swoole;
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
# RUN echo "extension=redis.so" >> "$PHP_INI_DIR/php.ini"
# RUN echo "extension=mongodb.so" >> "$PHP_INI_DIR/php.ini"
# RUN echo "extension=swoole.so" >> "$PHP_INI_DIR/php.ini"
RUN cp /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime

# Aumenta limites do PHP
# RUN echo "upload_max_filesize = 500M;" >> /usr/local/etc/php/conf.d/upload.ini;
# RUN echo "post_max_size = 520M;" >> /usr/local/etc/php/conf.d/upload.ini;
# RUN echo "memory_limit = -1;" >> /usr/local/etc/php/conf.d/memory_limit.ini;

# Ativa X DEBUG
# RUN if [ $WITH_XDEBUG = "true" ] ; then \
#         pecl install xdebug-2.9.8; \
#         docker-php-ext-enable xdebug; \
#         echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
#         echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
#         echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
#         echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
#         echo "xdebug.client_port=9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
#         echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
#         echo "xdebug.idekey=PHPSTORM_BRAAVO" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
# fi ;

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite