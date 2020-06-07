<?php

	require 'vendor/autoload.php';
	// Pegando o arquivo autoload da pasta vendor, para que possa utilizar o Twig

	$loader = new Twig_Loader_Filesystem('views');
	// Declarando a pasta views (que serão exibidas ao usar twig)

	$twig = new Twig_Environment($loader);
	// Carregando a pasta views
	// $link = mysqli_connect("sql110.epizy.com", "epiz_25916090", "JYCprYQD3l", "epiz_25916090_controlemicres");


	# Substitua abaixo os dados, de acordo com o banco criado
	$user = "epiz_25916090";
	$password = "JYCprYQD3l";
	$database = "epiz_25916090_controlemicres";

	# O hostname deve ser sempre localhost
	$hostname = "sql110.epizy.com";

	# Conecta com o servidor de banco de dados
	mysql_connect( $hostname, $user, $password ) or die( ' Erro na conexão ' );

	# Seleciona o banco de dados
	mysql_select_db( $database ) or die( 'Erro na seleção do banco' );

	# Executa a query desejada

	$query = "SELECT cpf,nome FROM funcionario";


	$result_query = mysql_query( $query ) or die(' Erro na query:' . $query . ' ' . mysql_error() );
	$result = mysql_query( $query ) or die(' Erro na query:' . $query . ' ' . mysql_error() );

	$userAll = array();

	while ($row = mysql_fetch_array( $result_query )){
		 $user = array('cpf' => $row[cpf],
			 'nome' => $row[nome],
		 );
		 array_push($userAll, $user);
	}





	# Exibe os registros na tela
	// while ($row = mysql_fetch_array( $result_query )) { print " -- " . $row[medida] . " -- " . $row[km]."\n"; }

	echo $twig->render('listafunc.html', array( "user" => $userAll,
		));
	// Chamando a página "hello.html" que está em views
	

?>
