#!/bin/bash

./get_composer.sh
php composer.phar install

mkdir db
touch db.sqlite