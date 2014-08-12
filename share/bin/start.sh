#!/usr/bin/env bash

export PORT=9000
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

echo "---------------------------"
echo "Launching site on port $PORT"
echo "---------------------------"
php -S 127.0.0.1:$PORT -t $DIR/../www/

