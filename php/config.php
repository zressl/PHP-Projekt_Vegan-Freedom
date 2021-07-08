<?php

/**
 * Aufbau zur DB connection.
 */

define("DBSERVER", 'localhost');
define("DBUSER", 'root');
define("DBPASSWORT", 'root');
define("DBNAME", 'vegan_freedom');

$db_connection = mysqli_connect(DBSERVER, DBUSER, DBPASSWORT, DBNAME)
OR die('DB verbindung hat nicht geklappt: '.mysqli_connect_error());

?>