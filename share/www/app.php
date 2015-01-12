<?php
global $lucid;
include(__DIR__.'/../etc/router.php');  # load the router. You definitely need this.
include(__DIR__.'/../etc/orm.php');     # load the ORM layer. You probably want this, or something equivalent.
include(__DIR__.'/../etc/html.php');    # load the html library for components. You may want this.
include(__DIR__.'/../etc/ruleset.php'); # load the ruleset library for components. You may want this.

lucid::process();
lucid::deinit();
?>