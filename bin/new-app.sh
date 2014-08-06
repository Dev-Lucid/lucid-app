#!/usr/bin/env bash

if [ $# -ne 1 ]
  then
    echo "You must provide one argument: the name of the app to setup"
    exit
fi

if [ ! -d "$1" ]; then
  mkdir apps/$1
fi

mkdir apps/$1/etc;
mkdir apps/$1/bin;
mkdir apps/$1/lib;
mkdir apps/$1/db;
mkdir apps/$1/db/models;
mkdir apps/$1/db/models/base;
mkdir apps/$1/www;
mkdir apps/$1/www/controllers/;
mkdir apps/$1/www/media;
mkdir apps/$1/www/media/js;
mkdir apps/$1/www/media/fonts;
mkdir apps/$1/www/media/less;

cp share/www/app.php apps/$1/www/;
cp share/www/index.php apps/$1/www/;

echo "Done."