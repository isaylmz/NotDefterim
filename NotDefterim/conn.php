<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "notdefterim";

//Veri tabanına bağlanma işlemi
$conn = mysqli_connect($servername, $username, $password, $database);


//Veri tabanı bağlantı kontrolü
if(!$conn){
	echo("Veri tabanına bağlanılamadı.".mysqli_error());
}

?>
