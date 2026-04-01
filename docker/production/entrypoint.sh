#!/bin/sh
set -eu
cd /var/www

mkdir -p \
  /var/www/bootstrap/cache \
  /var/www/storage/framework/cache/data \
  /var/www/storage/framework/sessions \
  /var/www/storage/framework/views \
  /var/www/storage/logs \
  /var/www/storage/app/public

chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/public || true
find /var/www/storage -type d -exec chmod 775 {} \; || true
find /var/www/storage -type f -exec chmod 664 {} \; || true
chmod -R 775 /var/www/bootstrap/cache || true

[ -L /var/www/public/storage ] || ln -s /var/www/storage/app/public /var/www/public/storage
chown -h www-data:www-data /var/www/public/storage || true

# no clear commands in live prod startup
su-exec www-data php artisan config:cache
su-exec www-data php artisan route:cache || true
su-exec www-data php artisan view:clear

exec supervisord -c /etc/supervisor/conf.d/supervisord.conf
