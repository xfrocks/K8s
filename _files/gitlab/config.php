<?php

$config['db']['dbname'] = getenv('MYSQL_DATABASE');
$config['db']['host'] = 'mysql';
$config['db']['password'] = getenv('MYSQL_PASSWORD');
$config['db']['username'] = getenv('MYSQL_USER');
