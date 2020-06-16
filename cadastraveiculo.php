<?php
	require 'vendor/autoload.php';
	include('js/decode.php');
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
	if (isset($_GET['placa'])){
		$id = (int) $_GET['placa'];
		// echo $id;
	}

	if (isset($_GET['json'])){
		if ($_GET['json'] == "") {
			// echo "faz nada \n";
		} else {
			$v1 = $_GET['json'];

			$b = new Base32;

			$b->setCharset(Base32::csSafe);
			$bstr = $v1;


			$fstr = str_replace('1','L',$bstr);
			$fstr = str_replace('0','o',$fstr);
			$fstr = str_replace('=','',$fstr);

			$outstr = $b->toString($fstr);

			$pieces = explode(",", $outstr);

			$placa = $pieces[1];
			$cnpj_empresa = (int)$pieces[2];
			$marca = $pieces[3];
			$modelo = $pieces[4];

			if ($_GET['info'] == "c") {
				echo "cadastro";
				echo "<p>$placa</p>";
				echo "<p>$cnpj_empresa</p>";
				echo "<p>$marca</p>";
				echo "<p>$modelo</p>";
				// $row = $dbh->query("INSERT INTO veiculo (placa,cnpj_empresa,marca,modelo) VALUES ($placa,$cnpj_empresa,'$marca','$modelo')")->fetch();
				// header('Location: listafunc.php');

			}elseif ($_GET['info'] == "u") {
				echo "updadte";
				// $row = $dbh->query("UPDATE veiculo SET nome = '$nome' , tipo = $tipo WHERE placa =$cpf")->fetch();
				// header('Location: listafunc.php');
			}
			elseif ($_GET['info'] == "d") {
				echo "delete";
				// $row = $dbh->query("DELETE FROM veiculo WHERE placa =$cpf")->fetch();
				// header('Location: listafunc.php');
			}
		}
	}

		# Executa a query desejada
		$row = $dbh->query("SELECT placa,cnpj_empresa,marca,modelo FROM veiculo WHERE cnpj_empresa =$cnpj_empresa LIMIT 1")->fetch();

		if ($_GET['info'] == "u") {
				$user = array('placa' => $row['placa'],
					 'cnpj_empresa' => $row['cnpj_empresa'],
					 'marca' => $row['marca'],
					 'modelo' => $row['modelo'],
				 );
		}else {
			$user = array('placa' => $placa,
				 'cnpj_empresa' => $row['cnpj_empresa'],
				 'marca' => $marca,
				 'modelo' => $modelo,
			 );
		}
	# Exibe os registros na tela

	echo $twig->render('cadastraveiculo1.html', array( "user" => $user,
		));

?>
