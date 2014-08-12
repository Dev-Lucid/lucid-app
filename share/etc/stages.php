<?php
global $stages;

$stages = [
	'qa'=> [
		'hostname'=>'myqaserver',
		'username'=>'ubuntu',
		'identity_file'=>__DIR__.'/ssh/server.private',
		'install_folder'=>'/var/www',
	],
	'production'=> [
		'hostname'=>'myprodserver',
		'username'=>'ubuntu',
		'identity_file'=>__DIR__.'/ssh/server.private',
		'install_folder'=>'/var/www',
	],
]
?>