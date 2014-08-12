#!/usr/bin/env bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

if [ $# -ne 1 ]
  then
    echo "You must provide one argument: the name of the app which you want to monitor"
    exit
fi

bash $DIR/../apps/$1/bin/logs.sh;