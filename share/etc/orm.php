<?php
global $lucid;

class generic_object_orm{}
if(!is_object($lucid))
{
	$lucid = new generic_object_orm();
}

include(__DIR__.'/../../../lib/lucid-orm/lib/php/lucid_orm.php');
$lucid->db = lucid_orm::init([
    'type'=>'sqlite',
    'path'=>__DIR__.'/../db/development.db',
    'model_path'=>__DIR__.'/../db/models/',
    'log_path'=>__DIR__.'/../var/log/orm.log',
]);
?>