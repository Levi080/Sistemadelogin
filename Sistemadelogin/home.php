<?php
//Conexão com o arquivoconexao.php
require_once 'arquivoconexao.php';

//Iniciar uma sessão
session_start();

//Verificação para que após o logout, eu não consiga voltar mais a página anterior.
if (!isset($_SESSION['logado'])):
	header('Location: index.php');
endif;

//Dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect); //fecha a conexão com o banco de dados

?>

<html>
<head>
	<title>Página pós login</title>
</head>
<body>

 <h1>OlÁ <?php echo $_SESSION['id_usuario']; ?></h1>

 <a href="logout.php">SAIR</a>

</body>
</html>