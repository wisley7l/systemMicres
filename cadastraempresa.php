<?php
	require 'vendor/autoload.php';
	// Pegando o arquivo autoload da pasta vendor, para que possa utilizar o Twig

	$loader = new Twig_Loader_Filesystem('views');
	// Declarando a pasta views (que serão exibidas ao usar twig)

	$twig = new Twig_Environment($loader);
	// Carregando a pasta views

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

		$result_query = mysql_query( $query ) or die(mysql_query( $query2 ) or die(' Erro na query:' . $query2 . ' ' . mysql_error() ));
		if($result_query == true ){
			echo "SUCESS0";
		}

	}

	// */

	# Exibe os registros na tela
	// while ($row = mysql_fetch_array( $result_query )) { print " -- " . $row[medida] . " -- " . $row[km]."\n"; }

	echo $twig->render('cadastraempresa.html', array( "user" => $userAll,
		));
	// Chamando a página "hello.html" que está em views


?>
