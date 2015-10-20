#!/bin/bash

rsync -arv . /var/www/html/project/
chmod -R 777 /var/www/html/project/
