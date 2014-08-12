<?php
global $lucid;
include(__DIR__.'/../../../lib/lucid-router/lib/php/lucid.php');
lucid::init([
	'log_path'=>__DIR__.'/../var/log/debug.log',
]);
?>