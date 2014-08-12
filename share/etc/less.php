<?php
global $less;
$less = array( 
	'files'=>array(__DIR__.'/../www/media/less/customizations.less' => '/' ),
	'cache_dir' => __DIR__.'/../var/cache/',
	'import_dirs'=>[
		__DIR__.'/../../../lib/bootstrap/less/'=>'/',
		__DIR__.'/../../../lib/BootstrapConstructor/lib/less/'=>'/',
	],
	'compress'=>true 
);
?>