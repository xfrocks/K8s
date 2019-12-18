<?php

$config['db']['dbname'] = getenv('MYSQL_DATABASE');
$config['db']['host'] = 'mysql';
$config['db']['password'] = getenv('MYSQL_PASSWORD');
$config['db']['username'] = getenv('MYSQL_USER');

$config['debug'] = true;

$config['fsAdapters']['data'] = function () {
  return new \League\Flysystem\Adapter\Ftp([
  	'host' => 'ftp',
  	'passive' => false,
  	'password' => 'password',
  	'username' => 'data',
  ]);
};
$config['externalDataUrl'] = function ($externalPath, $canonical) {
  return sprintf('http://%s/data/%s', getenv('_ingressHost'), $externalPath);
};

$config['fsAdapters']['internal-data'] = function () {
  return new \League\Flysystem\Adapter\Ftp([
  	'host' => 'ftp',
  	'passive' => false,
  	'password' => 'password',
    'port' => 10021,
  	'username' => 'internal_data',
  ]);
};
