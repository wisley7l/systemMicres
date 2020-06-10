<?php

	require 'vendor/autoload.php';
	// Pegando o arquivo autoload da pasta vendor, para que possa utilizar o Twig

	$loader = new Twig_Loader_Filesystem('views');
	// Declarando a pasta views (que serão exibidas ao usar twig)

	$twig = new Twig_Environment($loader);
	// Carregando a pasta views
	// $link = mysqli_connect("sql110.epizy.com", "epiz_25916090", "JYCprYQD3l", "epiz_25916090_controlemicres");


	# Substitua abaixo os dados, de acordo com o banco criado
	$user = "padmin";
	$password = "nJKSQj4xtAD8OyLw";
	$database = "controleMicres";

	# O hostname deve ser sempre localhost
	$hostname = "localhost";
	# Conecta com o servidor de banco de dados
	$dbh = new PDO('mysql:host='.$hostname .';dbname='. $database, $user, $password);

	if (isset($_GET['cnpj'])){
		$id = (int) $_GET['cnpj'];
		// echo $id
		}

	# Executa a query desejada
	$row = $dbh->query("SELECT cnpj,nome,nveiculo FROM empresa WHERE cnpj = $id LIMIT 1")->fetch();


// /*
	// $row = $stmt->fetch()
	$user = array('cnpj' => $row['cnpj'],
		 'nome' => $row['nome'],
		 'nveiculos' => $row['nveiculo'],
	 );
	 echo $user['cnpj'];

	# Exibe os registros na tela
	// while ($row = mysql_fetch_array( $result_query )) { print " -- " . $row[medida] . " -- " . $row[km]."\n"; }

	// echo $twig->render('buscaempresa1.html', array( "user" => $user,
		// ));
	// Chamando a página "hello.html" que está em views


?>
