<?php




/*const DB_SERVER = 'sql200.epizy.com';
const DB_USERNAME = "epiz_32942932";
const DB_PASSWORD = "oVHgRThfIHX";
const DB_NAME = "epiz_32942932_soda";*/


const DB_SERVER = 'localhost';
const DB_USERNAME = "root";
const DB_PASSWORD = "";
const DB_NAME = "soda";

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

