<?php
header("Content-Type: text/css");
header("X-Content-Type-Options: nosniff"); 

global $less;
include(__DIR__.'/../../../../../lib/less.php/lessc.inc.php');
include(__DIR__.'/../../../etc/less.php');

$css_file_name = Less_Cache::Get( $less['files'], $less );
$compiled = file_get_contents($less['cache_dir'].$css_file_name );

echo($compiled);
?>