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

	if (isset($_GET['cod'])){
		$id = $_GET['cod'];
		// echo $id;
		}

	# Executa a query desejada
	$row = $dbh->query("SELECT p.cod,p.veiculo,p.status,p.pos_veic, v.modelo, v.marca
		FROM pneu p, veiculo v
		WHERE (p.cod = '$id'AND v.placa = p.veiculo) LIMIT 1")->fetch();

		// "SELECT cod,veiculo,status,pos_veic FROM pneu WHERE veiculo = '$id' ")

	// $row = $stmt->fetch()
	if ($row['status']==1) {
		$pneu = "EM USO";
	}else {
		$pneu = "DESUSO";
	}

	$user = array('cod' => $row['cod'],
		 'placa' => $row['veiculo'],
		 'status' => $pneu,
		 'pos_veic' => $row['pos_veic'],
		 'veiculo' => $row['marca'] . " - " . $row['modelo'],
	 );
	 # Executa a query desejada
 	// $stmt = $dbh->query("SELECT cod,veiculo,status,pos_veic FROM pneu WHERE veiculo = '$id' ");

 	// $userAll = array();

 	// while ($row = $stmt->fetch()){
	// 	if ($row['status']==1) {
	// 		$pneu = "EM USO";
	// 	}else {
	// 		$pneu = "DESUSO";
	// 	}
 	// 	 $veiculo = array('cod' => $row['cod'],
 	// 		 'veiculo' => $row['veiculo'],
	// 		 'pos_veic' => $row['pos_veic'],
	// 		 'status' => $pneu,
 	// 	 );
 	// 	 array_push($userAll, $veiculo);
 	// }

	# Exibe os registros na tela

	// $query = "SELECT m.cod, m.medida, m.km, IFNULL((m.km - (SELECT m3.km FROM manutencao m3 WHERE m.id > m3.id AND m3.cod = m.cod ORDER BY m3.km DESC LIMIT 1 )),0) AS variacaokm,
	// IFNULL((- m.medida + (SELECT m2.medida FROM manutencao m2 WHERE m.id > m2.id AND  m2.cod = m.cod ORDER BY m2.km DESC LIMIT 1 )),0) AS variacao,
	// (m.medida - 3) AS falta
	// FROM manutencao m WHERE m.cod = " . $id . "  ORDER BY m.km DESC";

	$stmt = $dbh->query("SELECT m.cod_pneu, m.medida, m.km, IFNULL((m.km - (SELECT m3.km FROM manutencao m3 WHERE m.id > m3.id AND m3.cod_pneu = m.cod_pneu ORDER BY m3.km DESC LIMIT 1 )),0) AS variacaokm,
	IFNULL((- m.medida + (SELECT m2.medida FROM manutencao m2 WHERE m.id > m2.id AND  m2.cod_pneu = m.cod_pneu ORDER BY m2.km DESC LIMIT 1 )),0) AS variacao,
	(m.medida - 3) AS falta
	FROM manutencao m WHERE (m.cod_pneu = '$id' )ORDER BY m.km DESC");

	// $result_query = mysql_query( $query ) or die(' Erro na query:' . $query . ' ' . mysql_error() );
	// $result = mysql_query( $query ) or die(' Erro na query:' . $query . ' ' . mysql_error() );

	# Exibe os registros na tela

	$userAll = array();
	while ($row = $stmt->fetch()){
		// if ($row[variacaokm]!= 0) {
		// 	$media = $row[variacao]/$row[variacaokm];
		// 	$x = ($row[falta] / $media) + $row[km];
		// }
		// else {
		// 	$media = " - ";
		// 	$x = " - ";
		// }
		//
		// $medicao = array(
		// 	'cod'=> $row[cod],
		// 	'medida'=> $row[medida],
		// 	'km'=> $row[km],
		// 	'variacaomedida'=> $row[variacao],
		// 	'variacaokm'=> $row[variacaokm],
		// 	'media' => $media,
		// 	'faltakm'=> $row[falta],
		// 	'kmfinal'=> $x,
		// 	 );
		// 	 array_push($userAll, $medicao);
 	}

	// while ($row = mysql_fetch_array( $result_query )){
	//
	// 	}
		// $kmfinal = $userAll[0]['kmfinal'];
		// $codfinal = $userAll[0]['cod'];
		// $mediadesgaste = $userAll[0]['media'];



	echo $twig->render('buscapneu1.html', array( "user" => $user,
	"veiculos"=>$userAll,
		));
#	Chamando a página "hello.html" que está em views


?>
