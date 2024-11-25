<?php 


$sname= "localhost";
$unmae= "postgres";
$password = "";

$db_name = "workshop2";

$connectPG = pg_connect($sname, $unmae, $password, $db_name);

