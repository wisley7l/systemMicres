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

	# Executa a query desejada
	$query = "SELECT cpf,nome FROM funcionario";
	$stmt = $pdo->query($query);

	$userAll = array();
/*
	while (row = $stmt->fetch()){
		 $user = array('cpf' => $row['cpf'],
			 'nome' => $row['nome'],
		 );
		 array_push($userAll, $user);
	}




// */
	# Exibe os registros na tela
	// while ($row = mysql_fetch_array( $result_query )) { print " -- " . $row[medida] . " -- " . $row[km]."\n"; }

	echo $twig->render('listafunc1.html', array( "user" => $userAll,
		));
	// Chamando a página "hello.html" que está em views


?>
