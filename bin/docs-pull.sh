#!/bin/bash

DOCS_VERSIONS=(
    1.x
)

for v in "${DOCS_VERSIONS[@]}"; do
    if [ -d "resources/sources/$v" ]; then
        echo "Pulling latest documentation updates for $v..."
        (cd resources/sources/$v && git pull)
    else
        echo "Cloning $v..."
        git clone --single-branch --branch "$v" git@github.com:tonysm/turbo-laravel.git "resources/sources/$v"
    fi;
done
