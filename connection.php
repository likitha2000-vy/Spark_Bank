<?php
$servername="localhost";
$username="root";
$password="";
$dbname="bankdb";


$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
    echo "";
    
}
else 
{
    echo '<script>alert("not connected")</script>';
}
?>   