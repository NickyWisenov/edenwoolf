<?php

//$serverName = "localhost";
//$dbUserName = "root";
//$dbUserPassword = "";
//$dbName = "eden_woolf";
//mysql_connect($serverName, $dbUserName, $dbUserPassword) or die(mysql_error());
//mysql_select_db($dbName);

$path = dirname(dirname(__FILE__));

$path = $path . "/../config/db.php";
$db = require_once($path);

$conString = explode(';', $db['dsn']);
$database = end($conString);
$hostString = explode('=', $conString['0']);
$db1 = explode('=', $database);

//=========== host name
$dbHostName = end($hostString);
//=========== database name
$dbName = end($db1);
//=========== database username
$dbUser = $db['username'];
//=========== database password
$dbPass = $db['password'];
define('DB_NAME', "$dbName");
/** MySQL database username */
define('DB_USER', "$dbUser");
/** MySQL database password */
define('DB_PASSWORD', "$dbPass");
/** MySQL hostname */
define('DB_HOST', "$dbHostName");

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$link) {
    die('Not connected : ' . mysql_error());
}

// make foo the current db
$conn = mysql_select_db(DB_NAME, $link);
if (!$conn) {
    die('Can\'t use foo : ' . mysql_error());
}
?>