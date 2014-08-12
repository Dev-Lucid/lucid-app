#!/usr/bin/env php
<?php

if(count($argv) < 3)
{
	echo("You must pass at least two parameters: the name of the web app (e.g. testing.webapp), and the stage to setup (e.g. qa, production).\n");
	exit();
}

$app_name   = $argv[1];
$stage_name = $argv[2];
# check some basic info 
if(!file_exists(__DIR__.'/../apps/'.$app_name))
{
	exit("Could not find app: ".$app_name."\n");
}

global $stages;
if(!file_exists(__DIR__.'/../apps/'.$app_name.'/etc/stages.php'))
{
	exit("Could not find stages.php in app. should be : ".__DIR__.'/../apps/'.$app_name.'/etc/stages.php'."\n");
}
include(__DIR__.'/../apps/'.$app_name.'/etc/stages.php');
include(__DIR__.'/../apps/'.$app_name.'/etc/orm.php');


$stage = $stages[$stage_name];

$ssh_cmd = 'ssh -t ';
if(isset($stage['identity_file']) and $stage['identity_file'] != '')
{
	$ssh_cmd .= ' -i '.$stage['identity_file'].' ';
}
if(isset($stage['username']) and $stage['username'] != '')
{
	$ssh_cmd .= $stage['username'].'@';
}
$ssh_cmd .= $stage['hostname'];

$ssh_cmd .= ' "sudo apt-get -y install nginx php5-fpm php5-cli git; cd ~; sudo git clone https://github.com/Dev-Lucid/lucid-app.git;";';
echo("Installing.....\nEnter your sudo password: ");
#echo($ssh_cmd);
echo(exec($ssh_cmd));
exit("Done.\n");
?>