<?php
require_once 'DB.php';
# parameters for connecting to the "business_service" 
$username = "root";
$password = "";
$hostspec = "127.0.0.1";
$database = "business_service";
// $dbtype = 'pgsql';
// $dbtype = 'oci8';
$dbtype = 'mysqli';

# DSN constructed from parameters 
$dsn = array (
    'phptype' => $dbtype,
    'username' => $username,
    'password' => $password,
    'hostspec' => $hostspec,
    'database' => $database,
);

# Establish the connection
$db = DB::connect($dsn);
if (DB::isError($db)) {
    die($db->getMessage());
}
?> 


