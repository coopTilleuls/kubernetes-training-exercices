#!/bin/bash

set -e

if [ -z "$DOCKER_USER" ]; then
    echo missing DOCKER_USER
    exit 1
fi

for TAG in ex-*; do
    if [ -f $TAG/image/Dockerfile ]; then
        cd $TAG/image \
        && docker build . -t $DOCKER_USER/k8s-training:$TAG --push \
        && cd -
    fi
done
