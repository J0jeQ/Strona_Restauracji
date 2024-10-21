<?php 

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "forms";
$conn = "";

try{
$conn = mysqli_connect($db_server,
                       $db_user,
                       $db_pass,
                       $db_name);
}
catch(mysqli_sql_exception){
    echo "Nie udalo sie polaczyc z baza danych, sprobuj ponownie pozniej <br>";
}
?>