#!/usr/bin/env bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

if [ $# -ne 2 ]
  then
    echo "You must provide two arguments: a repo url, and the name of the app"
fi

git clone $1 $DIR/../apps/$2

echo "Done."