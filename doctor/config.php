<?php




/*const DB_SERVER = 'sql200.epizy.com';
const DB_USERNAME = "epiz_32942932";
const DB_PASSWORD = "oVHgRThfIHX";
const DB_NAME = "epiz_32942932_soda";*/


if(isset($_SESSION)){

}else{
    session_start();
}
const DB_SERVER = 'localhost';
const DB_USERNAME = "root";
const DB_PASSWORD = "";
const DB_NAME = "doc";

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}?>
<link rel="stylesheet" href="/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/69c4ef077f.js" crossorigin="anonymous"></script>
