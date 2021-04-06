<?php
//Essa página será exibida quando clicar no link SAIR do aquivo 'home.php' e aqui encerro a sessão.
session_start();
session_unset();
swession_destroy();
header('Location: index.php');
