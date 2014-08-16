#!/usr/bin/env php
<?php

if(count($argv) < 4)
{
	echo("You must pass at least three parameters: the name of the web app (e.g. mytestapp), the stage to deploy (e.g. qa, production), the type of deployment (upgrade-tag or change-tag). If you are using the change-tag procedure, you must also specify the new tag (e.g., v1.3).\n");
	echo("\nComplete examples:\n");
	echo("Upgrade qa to a newer version of the same tag: bin/deploy.php mytestapp qa upgrade-tag;\n");
	echo("Change qa to a new tag: bin/deploy.php mytestapp qa change-tag v1.2;\n");
	exit();
}

$filename = array_shift($argv);
$app_name = array_shift($argv);
$stage    = array_shift($argv);
$action   = array_shift($argv);

if($action == 'change-tag')
{
	if(count($argv) == 0)
	{
		exit("No tag specified. When changing tags, you must specify the new tag.\n");
	}
	$new_tag = array_shift($argv);
}


# check some basic info 
if(!file_exists(__DIR__.'/../apps/'.$app_name))
{
	exit("Could not find app: ".$app_name."\n");
}

if(!file_exists(__DIR__.'/../apps/'.$app_name.'/etc/stages.php'))
{
	exit("Could not find stages.php in app. should be : ".__DIR__.'/../apps/'.$app_name.'/etc/stages.php'."\n");
}

# load the stage config, make sure it's valid
global $stages;
include(__DIR__.'/../apps/'.$app_name.'/etc/stages.php');
if(!array_key_exists($stage, $stages))
{
	exit("Unable to find stage ".$stage." in config\n");
}
$config = $stages[$stage];

# build the ssh commadn that will actually perform the update
$ssh_cmd = $config['ssh-cmd'].' -X "cd '.$config['app-path'].'; bin/server-deploy.php '.$action;

if($action == 'upgrade-tag')
{
	$ssh_cmd .= ';';
}
else if ($action == 'change-tag')
{
	$ssh_cmd .= ' '.$new_tag.'";';
}l
else
{
	exit("Unknown action: ".$action.". Valid actions are upgrade-tag and change-tag.");
}

echo("Final ssh command: $ssh_cmd");
exit(shell_exec($ssh_cmd));
?>