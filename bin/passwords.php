<?php
echo("testing password hashing\n");

$password1_hash = '$2y$10$wHDMMT8IfEa9lEMzd2kQAuZvA2BwKNKPtwSE7ZNpQOBlO9Zlz0ORi';

echo('Does it match? '.(password_verify('password0',$password1_hash))."\n");
echo('Does it match? '.(password_verify('password1',$password1_hash))."\n");
echo('Does it match? '.(password_verify('password2',$password1_hash))."\n");


?>