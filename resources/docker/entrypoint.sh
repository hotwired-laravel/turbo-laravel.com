#!/usr/bin/env bash

php artisan importmap:optimize
php artisan tailwindcss:build --prod

if [ $# -gt 0 ]; then
    exec "$@"
else
    exec /init
fi
