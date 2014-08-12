#!/usr/bin/env bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

if [ $# -ne 1 ]
  then
    echo "You must provide one argument: the name of the app whose logs you want to clean"
    exit
fi

rm $DIR/../apps/$1/var/log/*.log;