<?php
header("Content-Type: text/css");
header("X-Content-Type-Options: nosniff"); 

include(__DIR__.'/../../../../../lib/less.php/lessc.inc.php');

$less_files = array(__DIR__.'/customizations.less' => '/' );
$options = array( 
	'cache_dir' => '/tmp',
	'import_dirs'=>[
		__DIR__.'/../../../../../lib/bootstrap/less/'=>'/',
		__DIR__.'/../../../../../lib/BootstrapConstructor/lib/less/'=>'/',
	],
	'compress'=>true 
);
$css_file_name = Less_Cache::Get( $less_files, $options );
$compiled = file_get_contents( '/tmp/'.$css_file_name );

echo($compiled);

?>