<?php
define("MYSQL_SERVER", "127.0.0.1:4040");
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "");
define("MYSQL_DATABASE", "booking4");

mysql_connect(MYSQL_SERVER,MYSQL_USER,MYSQL_PASSWORD) or die ('I cannot connect to the database because 1: ' . mysql_error());
mysql_select_db(MYSQL_DATABASE) or die ('I cannot connect to the database because 2: ' . mysql_error());
?>