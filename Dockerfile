FROM wyveo/nginx-php-fpm:php81

ADD . /var/www/html/thuviendcv
ADD docker/conf/web.conf /etc/nginx/conf.d/web.conf

RUN rm -f /etc/nginx/conf.d/default.conf
RUN rm -rf /etc/localtime
RUN ln -s /usr/share/zoneinfo/Asia/Ho_Chi_Minh /etc/localtime

WORKDIR /var/www/html/thuviendcv

RUN php artisan view:clear
RUN php artisan route:clear
RUN php artisan config:cache
RUN php artisan config:clear
RUN php artisan cache:clear

RUN chmod -R 777 storage/



