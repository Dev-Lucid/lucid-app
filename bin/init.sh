#!/usr/bin/env bash

git clone git@github.com:twbs/bootstrap.git lib/bootstrap
git clone git@github.com:Dev-Lucid/BootstrapConstructor.git lib/BootstrapConstructor
git clone git@github.com:oyejorge/less.php.git lib/less.php
git clone git@github.com:cowboy/jquery-hashchange.git lib/jquery-hashchange
git clone git@github.com:Dev-Lucid/lucid-router.git lib/lucid-router

git submodule foreach git pull origin master

echo "Done."