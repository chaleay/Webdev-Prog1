<?php
//how to set up a connection to mysqli database (this one uses phpadmin)

DEFINE('DB_USER', 'commerceProject');
DEFINE('DB_PASSWORD', '12345');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME', 'cs3320');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR dies('Could not connect to MySql: ' . mysqli_connect_error());




?>