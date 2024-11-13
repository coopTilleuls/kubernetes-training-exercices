#!/bin/bash

if [ -z "$DOCKER_USER" ]; then
    echo missing DOCKER_USER
    exit 1
fi

TAG=$(git tag --points-at HEAD)

docker build . -t $DOCKER_USER/k8s-training:$TAG --push
