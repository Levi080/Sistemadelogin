<?php
//nome do servidor, no meu caso, meu próprio pc
//nome do usuario do servidor
//senha do usuario do servidor
//nome do banco de dados
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$db_name = "database_levi";

// Criação de conecção com o banco de dados
$connect = mysqli_connect($servername, $username, $password,$db_name);

if (mysqli_connect_error())://Lê: se aparecer algum erro executar...
	echo "Falha na conexão: ".mysqli_connect_error();
endif;
