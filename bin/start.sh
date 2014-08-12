#!/usr/bin/env bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

if [ $# -ne 1 ]
  then
    echo "You must provide one argument: the name of the app to start"
    exit
fi

bash $DIR/../apps/$1/bin/start.sh;