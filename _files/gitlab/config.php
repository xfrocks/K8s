<?php

$config['db']['dbname'] = getenv('MYSQL_DATABASE');
$config['db']['host'] = 'mysql';
$config['db']['password'] = getenv('MYSQL_PASSWORD');
$config['db']['username'] = getenv('MYSQL_USER');

$config['fsAdapters']['data'] = function () {
  return new \League\Flysystem\Adapter\Ftp([
  	'host' => 'ftp',
  	'passive' => false,

  	# https://github.com/delfer/docker-alpine-ftp-server/blob/master/start_vsftpd.sh
  	'username' => 'ftp',
  	'password' => 'ftpalpine'
  ]);
};
$config['externalDataUrl'] = function ($externalPath, $canonical) {
  return sprintf('http://%s/data/%s', getenv('_ingressHost'), $externalPath);
};
