<?php
/**
 * Get the database connection
 * 
 * @return object Connection to a MySQL server
 */
function getDB()
{
    $db_host = "localhost";
    $db_name = "scandiwebdb";
    $db_user = "scandiweb_www";
    $db_pass = "MyNewPass2";
    
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
    
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
    return $conn;
}
