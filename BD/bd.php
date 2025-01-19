<?php
//$con=mysqli_connect("localhost:8278","root","","ecommerce_cms");
//$con = mysqli_connect('HOSTNAME','USERNAME','PASSWORD');
$password = getenv('MYSQL_SECURE_PASSWORD');
$conn = new mysqli($servername, $username, $password);
if(mysqli_connect_error())
{
    echo"Failed to connect to mysql : ".mysqli_connect_error();
}

mysqli_query($conn,"SET NAMES 'utf8'");
?>
