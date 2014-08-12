#!/usr/bin/env php
<?php

if(count($argv) < 3)
{
	exit("You must pass two parameters: the name of the web app (e.g. testing.webapp), and the patch path relative to apps/[app name]/db/patches/ (e.g. 00001.sql)");
}

class empty_class{

}


global $lucid;
$lucid = new empty_class();
$lucid->db = null;

include(__DIR__.'/../apps/'.$argv[1].'/etc/db.php');

# determine if this patch has already been applied

# parse the depends, error if there are unapplied dependencies

# perform the patch.

exit("Done.\n");
?>