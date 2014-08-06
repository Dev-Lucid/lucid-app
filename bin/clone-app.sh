#!/usr/bin/env bash

if [ $# -ne 2 ]
  then
    echo "You must provide two arguments: a repo url, and the name of the app"
fi

git clone $1 apps/$2

echo "Done."