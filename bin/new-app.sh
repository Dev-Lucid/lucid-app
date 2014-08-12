#!/usr/bin/env bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

if [ $# -ne 1 ]
  then
    echo "You must provide one argument: the name of the app to setup"
    exit
fi

if [ ! -d "$1" ]; then
  mkdir $DIR/../apps/$1
fi

echo "Making directories..."
mkdir $DIR/../apps/$1/var;
mkdir $DIR/../apps/$1/var/log;
mkdir $DIR/../apps/$1/var/cache;
mkdir $DIR/../apps/$1/etc;
mkdir $DIR/../apps/$1/etc/ssh;
mkdir $DIR/../apps/$1/etc/apache;
mkdir $DIR/../apps/$1/bin;
mkdir $DIR/../apps/$1/lib;
mkdir $DIR/../apps/$1/db;
mkdir $DIR/../apps/$1/db/models;
mkdir $DIR/../apps/$1/db/models/base;
mkdir $DIR/../apps/$1/db/patches;
mkdir $DIR/../apps/$1/www;
mkdir $DIR/../apps/$1/www/controllers/;
mkdir $DIR/../apps/$1/www/controllers/static_content;
mkdir $DIR/../apps/$1/www/controllers/static_content/views;
mkdir $DIR/../apps/$1/www/media;
mkdir $DIR/../apps/$1/www/media/js;
mkdir $DIR/../apps/$1/www/media/img;
mkdir $DIR/../apps/$1/www/media/less;

echo "Copying over scripts..."
cp $DIR/../share/bin/start.sh $DIR/../apps/$1/bin/;
cp $DIR/../share/bin/logs.sh $DIR/../apps/$1/bin/;
chmod 777 $DIR/../apps/$1/bin/start.sh;
chmod 777 $DIR/../apps/$1/bin/logs.sh;

echo "Copying basic template, app loader, js/css compilers..."
cp $DIR/../share/www/app.php $DIR/../apps/$1/www/;
cp $DIR/../share/www/index.php $DIR/../apps/$1/www/;
cp $DIR/../share/etc/js.php $DIR/../apps/$1/etc/;
cp $DIR/../share/www/media/js/compile.php $DIR/../apps/$1/www/media/js/;
cp $DIR/../share/www/media/js/customizations.js $DIR/../apps/$1/www/media/js/;
cp $DIR/../share/etc/less.php $DIR/../apps/$1/etc/;
cp $DIR/../share/www/media/less/compile.php $DIR/../apps/$1/www/media/less/;
cp $DIR/../share/www/media/less/customizations.less $DIR/../apps/$1/www/media/less/;


echo "Copying static content..."
#wget http://code.jquery.com/jquery-1.11.1.min.js -O $DIR/../apps/$1/www/media/js/jquery.js;
cp ~/jquery.js $DIR/../apps/$1/www/media/js/jquery.js;
cp $DIR/../share/www/controllers/static_content/views/index.php $DIR/../apps/$1/www/controllers/static_content/views/;
cp $DIR/../share/www/controllers/static_content/views/about.php $DIR/../apps/$1/www/controllers/static_content/views/;
cp $DIR/../share/www/controllers/static_content/views/login.php $DIR/../apps/$1/www/controllers/static_content/views/;


echo "Building database and models..."
cp $DIR/../share/etc/router.php $DIR/../apps/$1/etc/;
cp $DIR/../share/etc/orm.php $DIR/../apps/$1/etc/;
cp $DIR/../share/etc/stages.php $DIR/../apps/$1/etc/;
cp $DIR/../share/etc/ssh/server.private $DIR/../apps/$1/etc/ssh/;
cp $DIR/../share/etc/ssh/server.public $DIR/../apps/$1/etc/ssh/;
cp $DIR/../share/etc/apache/httpd-ssl.conf $DIR/../apps/$1/etc/apache/;
cp $DIR/../share/etc/apache/httpd-nossl.conf $DIR/../apps/$1/etc/apache/;
cp $DIR/../share/db/build.sql $DIR/../apps/$1/db/;
sqlite3 $DIR/../apps/$1/db/development.db ".read $DIR/../share/db/build.sql";
$DIR/../bin/build-models.php $1;
echo "*.log" > $DIR/../apps/$1/var/log/.gitignore

echo "Done. To run this webapp, start.sh $1"