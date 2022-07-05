#!/usr/bin/env bash

mkdir -p bootstrap/cache
chmod -R 775 bootstrap/cache
touch storage/logs/laravel.log
chmod -R 777 storage/logs/laravel.log

# install library
composer dump-autoload

# init app if not
environment_file=".env"

if [ ! -f "$environment_file" ]
then
    echo "---- Create environment file -----"
    cp .env.example .env
fi

php artisan key:generate

[ ! -d storage/app/public ]            && mkdir -p storage/app/public
[ ! -d storage/framework/cache/data ]  && mkdir -p storage/framework/cache/data
[ ! -d storage/framework/sessions ]    && mkdir -p storage/framework/sessions
[ ! -d storage/framework/testing ]     && mkdir -p storage/framework/testing
[ ! -d storage/framework/views ]       && mkdir -p storage/framework/views

chown -R www-data:www-data storage

until nc -z -v -w30 $DB_HOST $DB_PORT
do
  echo "Waiting for database connection..."
  # wait for 5 seconds before check again
  sleep 5
done

php artisan migrate --force

php artisan db:seed --force

supervisord -c /etc/supervisord.conf

printenv | sed 's/^\([a-zA-Z0-9_]*\)=\(.*\)$/export \1="\2"/g' > /opt/project_env.sh

chmod 777 /opt/project_env.sh
chmod -R 777 storage

cron -L 15 -f
