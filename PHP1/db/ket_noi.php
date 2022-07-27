<?php
function getConnection(){
    $dbUrl = "mysql: host=localhost; dbname=web16305";
    $dbUser = "root";
    $dbPass = "";  
    $connection =  new PDO($dbUrl, $dbUser, $dbPass);
    return $connection;
    
}
