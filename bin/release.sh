#!/usr/bin/env bash

shopt -s expand_aliases

alias kamal='docker run -it --rm -v "${PWD}:/workdir" -v "${SSH_AUTH_SOCK}:/ssh-agent" -v /var/run/docker.sock:/var/run/docker.sock -e "SSH_AUTH_SOCK=/ssh-agent" ghcr.io/basecamp/kamal:latest'

# pull and commit docs if necessary
bash bin/docs-pull.sh

if [[ $(git status --porcelain) ]]; then
    git add resource/docs
    git commit -m "update docs"
fi

kamal deploy -d production
