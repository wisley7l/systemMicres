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
		if (isset($_GET['cnpj'])){
			$id = (int) $_GET['cnpj'];
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

				$cnpj = (int) $pieces[1];
				$nomeempresa = $pieces[2];
				// $tipo = (int)$pieces[3];

				if ($_GET['info'] == "c") {
					echo "cadastro";
					$row = $dbh->query("INSERT INTO empresa (cnpj,nome)	VALUES ($cnpj, '$nomeempresa')")->fetch();
					header('Location: listaempresa.php');

				}elseif ($_GET['info'] == "u") {
					echo "updadte";
					$row = $dbh->query("UPDATE empresa	SET nome = '$nomeempresa' WHERE cnpj = $cnpj")->fetch();
					header('Location: listaempresa.php');
				}
				elseif ($_GET['info'] == "d") {
					echo "delete";
					$row = $dbh->query("DELETE FROM empresa WHERE cnpj =$cnpj")->fetch();
					header('Location: listaempresa.php');
				}
			}
		}

			# Executa a query desejada
			$row = $dbh->query("SELECT cnpj,nome,nveiculo FROM empresa WHERE cnpj =$id LIMIT 1")->fetch();
			$row2 = $dbh->query("SELECT COUNT(placa) as p FROM veiculo WHERE cnpj_empresa =$id")->fetch();
			$row3 = $dbh->query("UPDATE empresa	SET nveiculo = $row2['p'] WHERE cnpj = $id")->fetch();

			$user = array('cnpj' => $row['cnpj'],
				 'nome' => $row['nome'],
				 'nveiculo' => $row2['p'],
			 );

	# Exibe os registros na tela
	echo $twig->render('cadastraempresa1.html', array( "user" => $user,
		));
	// Chamando a página "hello.html" que está em views


?>
