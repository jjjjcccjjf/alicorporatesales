<?php

$path = $_SERVER['DOCUMENT_ROOT']; #TODO: Change me on live

include_once $path . '/wp-config.php';
include_once $path . '/wp-load.php';
include_once $path . '/wp-includes/wp-db.php';
include_once $path . '/wp-includes/pluggable.php';

function run()
{
  echo "hello world";
}

header('Content-Type: application/json');
run();
