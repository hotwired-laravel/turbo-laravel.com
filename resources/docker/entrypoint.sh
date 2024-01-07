#!/usr/bin/env bash

if [ $# -gt 0 ]; then
    exec "$@"
else
    # Do things like running migrations here...

    exec /init
fi
