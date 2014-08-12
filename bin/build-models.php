#!/usr/bin/env php
<?php

if(count($argv) < 2)
{
	exit("You must pass one parameter: the name of the web app (e.g. testing.webapp)");
}

class empty_class{

}


global $lucid;
$lucid = new empty_class();
$lucid->db = null;

include(__DIR__.'/../apps/'.$argv[1].'/etc/orm.php');
include(__DIR__.'/../lib/lucid-orm/bin/generate_models.php');
lucid_model_generator::generate($lucid->db);


?>