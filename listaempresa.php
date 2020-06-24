<?php
	// include('js/functions.php');
	session_write_close();
	session_start();
	if (isset($_SESSION)) {
	  //modify the value of the login variable, by the value saved in the session
	  //var_dump($_SESSION);
	  // set values for user, with the values saved in the session
	  // array used to set user panel parameters
	  $user_login = getUserLogin();
	  // query the user in db for more information to update
	  // ex: about user, website, email
	}
	// check if logout attempt
	if (isset($_GET['logout'])){
	  // if attempt is true, destroy session values and redirect to index page
	  session_destroy();
	  // obs. check redirection on all pages
	  header("Location: index");
	  exit;
	}
	if ($_SESSION['login'] == false) {
	  header("Location: error-page");
	}

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
	$stmt = $dbh->query("SELECT e.cnpj,e.nome,e.nveiculo FROM empresa e");


	$userAll = array();
// /*
	while ($row = $stmt->fetch()){
		 $user = array('cnpj' => $row['cnpj'],
			 'nome' => $row['nome'],
			 'nveiculo' => $row['nveiculo'],
		 );
		 array_push($userAll, $user);
	}





	# Exibe os registros na tela
	// while ($row = mysql_fetch_array( $result_query )) { print " -- " . $row[medida] . " -- " . $row[km]."\n"; }

	echo $twig->render('listaempresa1.html', array( "user" => $userAll,
		));
	// Chamando a página "hello.html" que está em views


?>
