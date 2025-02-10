<?php
$servername="localhost";
$username="root";
$password="";
$database="Users_Database";

$conn=new mysqli($servername,$username,$password,$database);

if(!$conn)
{
    echo "<div class='container mt-4'>";
    echo "<div class='alert alert-danger' role='alert'>Connection failed!</div>";
    echo "</div>";
}
else{
    echo "<div class='container mt-4'>";
    echo "<div class='alert alert-success' role='alert'>Connection Success!</div>";
    echo "</div>";
}
?>