<?php
/*This files is used to make a secure connection
to a database using mysqli extension.

Remember, it will be used with conjunction with
session file to make the connection and start
a session*/

$hostname = "localhost";
$username = "root";
$password = "linkinpark";
$database = "coderconf";
$mysqli = new mysqli($hostname, $username, $password, $database);

if (mysqli_connect_errno())
{
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>
