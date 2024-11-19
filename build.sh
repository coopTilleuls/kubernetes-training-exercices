#!/bin/bash

set -x

if [ -z "$DOCKER_USER" ]; then
    echo missing DOCKER_USER
    exit 1
fi

for TAG in ex-*; do
    test -f $TAG/image/Dockerfile \
    && (
        cd $TAG/image \
        && docker build . -t $DOCKER_USER/k8s-training:$TAG --push
    )
done
