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
	if (isset($_GET['cpf'])){
		$id = (int) $_GET['cpf'];
		// echo $id;
	}

	if (isset($_GET['json'])){
		if ($_GET['json'] == "") {
			echo "faz nada \n";
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

			$cpf = (int) $pieces[1];
			$nome = $pieces[2];
			$tipo = (int)$pieces[3];

			if ($_GET['info'] == "c") {
				echo "cadastro";
				$row = $dbh->query("INSERT INTO funcionario (cpf,nome,tipo) VALUES ($cpf, '$nome',$tipo)")->fetch();
				header('Location: listafunc.php');

			}elseif ($_GET['info'] == "u") {
				echo "updadte";
				$row = $dbh->query("UPDATE funcionario SET nome = '$nome' , tipo = $tipo WHERE cpf =$cpf")->fetch();
				header('Location: listafunc.php');
			}
			elseif ($_GET['info'] == "d") {
				echo "delete";
				$row = $dbh->query("DELETE FROM funcionarioWHERE cpf =$cpf")->fetch();
				header('Location: listafunc.php');
			}
		}
	}

		# Executa a query desejada
		$row = $dbh->query("SELECT cpf,nome,tipo FROM funcionario WHERE cpf =$id LIMIT 1")->fetch();

		if ($row['tipo'] == 0) {
		 $checked1 = "";
		 $checked2 = "checked";
		}else {
		 $checked1 = "checked";
		 $checked2 = "";
		}

		$user = array('cpf' => $row['cpf'],
			 'nome' => $row['nome'],
			 'tipo' => $row['tipo'],
			 'checked1' => $checked1,
			 'checked2' => $checked2,
		 );

	# Exibe os registros na tela

	echo $twig->render('cadastrafunc1.html', array( "user" => $user,
		));

?>
