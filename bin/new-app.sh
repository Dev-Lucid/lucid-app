#!/usr/bin/env bash

if [ $# -ne 1 ]
  then
    echo "You must provide one argument: the name of the app to setup"
    exit
fi

if [ ! -d "$1" ]; then
  mkdir apps/$1
fi

mkdir apps/$1/var;
mkdir apps/$1/var/log;
mkdir apps/$1/etc;
mkdir apps/$1/bin;
mkdir apps/$1/lib;
mkdir apps/$1/db;
mkdir apps/$1/db/models;
mkdir apps/$1/db/models/base;
mkdir apps/$1/www;
mkdir apps/$1/www/controllers/;
mkdir apps/$1/www/controllers/static_content;
mkdir apps/$1/www/controllers/static_content/views;
mkdir apps/$1/www/media;
mkdir apps/$1/www/media/js;
mkdir apps/$1/www/media/img;
mkdir apps/$1/www/media/less;

cp share/bin/start.sh apps/$1/bin/;
chmod 777 apps/$1/bin/start.sh;

cp share/www/app.php apps/$1/www/;
cp share/www/index.php apps/$1/www/;
cp share/www/media/js/compile.php apps/$1/www/media/js/;
cp share/www/media/js/customizations.js apps/$1/www/media/js/;
cp share/www/media/less/compile.php apps/$1/www/media/less/;
cp share/www/media/less/customizations.less apps/$1/www/media/less/;


wget http://code.jquery.com/jquery-1.11.1.min.js -O apps/$1/www/media/js/jquery.js;
cp share/www/controllers/static_content/views/index.php apps/$1/www/controllers/static_content/views/;
cp share/www/controllers/static_content/views/about.php apps/$1/www/controllers/static_content/views/;
cp share/www/controllers/static_content/views/login.php apps/$1/www/controllers/static_content/views/;


echo "Done. To run this webapp, cd apps/$1; ./bin/start.sh; Then open your browser to http://127.0.0.1:9000"