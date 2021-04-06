<?php
//Conexão com o arquivoconexao.php
require_once 'arquivoconexao.php';

//Iniciar uma sessão
session_start();

//Botão enviar
if (isset($_POST['form-enviado'])):
	$erros = array();
	$login = mysqli_escape_string($connect, $_POST['login']); // Estar recebendo dados que veio do input login.
	$senha = mysqli_escape_string($connect, $_POST['senha']);

	if (empty($login) or empty($senha)):
	 $erros[] = "<li> O campo login/senha precisa ser preenchido";
	else:
		$sql = "SELECT login FROM usuarios WHERE login = '$login'";
		$resultado = mysqli_query($connect, $sql);

		if (mysqli_num_rows($resultado) > 0)://Lê: se existir alguma linha e se ela for maior do que 0(a partir de 1 linha) que tenha o mesmo conteúdo da variável $resultado no banco de dados executa...
		$senha = md5($senha); //Criptografa o conteúdo da variável para md5, a mesma criptografia que foi usada no banco de dados.
		$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
		$resultado = mysqli_query($connect, $sql);

			if (mysqli_num_rows($resultado) == 1):
				$dados = mysqli_fetch_array($resultado);
				mysqli_close($connect); //Encerra a consulta ao banco de dados, essa função é uma boa prática de progamação.
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $dados['id'];
				header('Location: home.php');//Direciona para a página pós login.

			else:
				$erros[] = "<li>Usuário e senha não conferem";
			endif;
			
		else:
			$erros[] = "<li>Usuário inexistente</li>";
		endif;
    endif;
endif;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Página de login</title>
</head>
<body>

<h1>LOGIN</h1>
<?php 

if (!empty($erros)):
	foreach ($erros as $erro):
		echo $erro;
	endforeach;
endif;

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

	Login: <input type="text" name="login"><br>
	Senha: <input type="password" name="senha"><br>
	<input type="submit" name="form-enviado">
	
</form>

</body>
</html>