<?php
global $lucid;
include(__DIR__.'/../etc/router.php');
include(__DIR__.'/../etc/orm.php');

lucid::process();
lucid::deinit();
?>
