#!/usr/bin/env bash

php artisan importmap:optimize

if [ $# -gt 0 ]; then
    exec "$@"
else
    exec /init
fi
