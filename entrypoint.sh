#!/usr/bin/env sh
# This file is the script that runs when the container starts.

set -e

php-fpm -D
nginx -g 'daemon off;'
