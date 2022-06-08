<?php
define("DB_USERNAME","faraz");
define("DB_HOST","localhost");
define("DB_PASSWORD","12345678");
define("DB_DATABASE","school_portal");

$conn=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if($conn->connect_error)
{
    echo 'CONNECTION FAILED' . $conn->connect_error;
}
else{
    echo "CONNECTION ESTABLISHED";
}
