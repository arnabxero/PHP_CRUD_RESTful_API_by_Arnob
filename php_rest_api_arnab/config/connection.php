<?php


$conn = mysqli_connect('localhost', 'root', '', 'php_rest_api');


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connection successfull";

?>