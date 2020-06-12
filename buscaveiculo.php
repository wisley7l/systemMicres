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

	if (isset($_GET['placa'])){
		$id = $_GET['placa'];
		// echo $id;
		}

	# Executa a query desejada
	// $row = $dbh->query("SELECT cnpj,nome,nveiculo FROM empresa WHERE cnpj = $id LIMIT 1")->fetch();
	// $row = $dbh->query("SELECT 'v.placa','v.cnpj_empresa','v.marca',v'.modelo','v.pneususo','v.pneus','e.nome' FROM veiculo v, empresa e WHERE placa = '$id' AND v.cnpj_empresa = e.cnpj LIMIT 1")->fetch();
$row = $dbh->query("SELECT * FROM veiculo v, empresa e WHERE placa = '$id' AND v.cnpj_empresa = e.cnpj LIMIT 1")->fetch();

// /*
	// $row = $stmt->fetch()
	// $user = array('placa' => $row['v.placa'],
	// 	 'cnpj_empresa' => $row['v.cnpj_empresa'],
	// 	 'marca' => $row['v.marca'],
	// 	 'modelo' => $row['v.modelo'],
	// 	 'pneususo' => $row['v.pneususo'],
	// 	 'pneus' => $row['v.pneus'],
	//  );
	 # Executa a query desejada
 	// $stmt = $dbh->query("SELECT cod,veiculo,status,pos_veicu FROM pneu WHERE veiculo = $id");
	//
 	// $userAll = array();
	//
 	// while ($row = $stmt->fetch()){
	// 	if ($row['status']==1) {
	// 		$pneu = "EM USO";
	// 	}else {
	// 		$pneu = "DESUSO";
	// 	}
 	// 	 $veiculo = array('cod' => $row['cod'],
 	// 		 'veiculo' => $row['veiculo'],
	// 		 'pos_veicu' => $row['pos_veicu'],
	// 		 'status' => $pneu,
 	// 	 );
 	// 	 array_push($userAll, $veiculo);
 	// }

	# Exibe os registros na tela


	echo $twig->render('buscaveiculo1.html', array( "user" => $user,
	// "veiculos"=>$userAll,
		));
#	Chamando a página "hello.html" que está em views


?>
