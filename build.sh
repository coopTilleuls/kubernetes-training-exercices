#!/bin/bash

set -x

if [ -z "$DOCKER_USER" ]; then
    echo missing DOCKER_USER
    exit 1
fi

for TAG in ex-*; do
    (
    cd $TAG
    test -f Dockerfile \
        && docker build . -t $DOCKER_USER/k8s-training:$TAG --push
    )
done
