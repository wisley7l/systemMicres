<?php
	require 'vendor/autoload.php';
	// Pegando o arquivo autoload da pasta vendor, para que possa utilizar o Twig

	$loader = new Twig_Loader_Filesystem('views');
	// Declarando a pasta views (que serão exibidas ao usar twig)

	$twig = new Twig_Environment($loader);
	// Carregando a pasta views

	# Substitua abaixo os dados, de acordo com o banco criado
	# Substitua abaixo os dados, de acordo com o banco criado
	$user = "padmin";
	$password = "nJKSQj4xtAD8OyLw";
	$database = "controleMicres";

	# O hostname deve ser sempre localhost
	$hostname = "localhost";
	# Conecta com o servidor de banco de dados
	$dbh = new PDO('mysql:host='.$hostname .';dbname='. $database, $user, $password);

	// /*
	if (isset($_GET['cnpj'])){
		$id = (int) $_GET['cnpj'];
		if(isset($_GET['nome'])){
			$nomeempresa = strval($_GET['nome']);
		}else {
			$nomeempresa = NULL;
		}
		// insert na coluna
		$query = "INSERT INTO empresa (cnpj,nome)
							VALUES ($id, '$nomeempresa')";

		$query2 = "UPDATE empresa
		SET nome = '$nomeempresa'
		WHERE cnpj = $id";

		// $result_query = $dbh->query($query);

		if($dbh->query($query) == true ){
			// echo "SUCESS0 Insert";
			header('Location: listaempresa.php');
		}else {
			// $result_query2 = $dbh->query($query2);
			if($dbh->query($query2) == true ){
				// echo "SUCESS0 Update";
				header('Location: listaempresa.php');
			}else {
				// echo "erro Update";
				header('Location: erro.php');
			}
		}

	}

	// */

	# Exibe os registros na tela
	// while ($row = mysql_fetch_array( $result_query )) { print " -- " . $row[medida] . " -- " . $row[km]."\n"; }

	echo $twig->render('cadastraempresa1.html', array( "user" => $userAll,
		));
	// Chamando a página "hello.html" que está em views


?>
