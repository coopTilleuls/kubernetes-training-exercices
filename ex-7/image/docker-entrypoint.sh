#!/bin/sh
set -e

composer install --prefer-dist --no-progress --no-interaction --no-scripts -q

exec "$@"
