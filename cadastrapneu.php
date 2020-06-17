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
	if (isset($_GET['cod'])){
		$id = $_GET['cod'];
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

			$cod =  strtoupper($pieces[1]);
			$veiculo= (int)$pieces[2];
			$status = $pieces[3];
			$pos= $pieces[4];
			// $pneususo = (int)$pieces[5];
			// $pneus = (int)$pieces[6];

			if ($_GET['info'] == "c") {
				echo "cadastro";
				// $row = $dbh->query("INSERT INTO veiculo (placa,cnpj_empresa,marca,modelo,pneususo,pneus) VALUES ('$placa',$cnpj_empresa,'$marca','$modelo',0,0)")->fetch();
				// $row5 = $dbh->query("SELECT count(placa) FROM veiculo WHERE cnpj_empresa = $cnpj_empresa")->fetch();
				// $row6 = $dbh->query("UPDATE empresa	SET nveiculo = $row5[0] WHERE cnpj = $cnpj_empresa")->fetch();
				// header('Location: buscaempresa.php?cnpj=' . $cnpj_empresa);

			}elseif ($_GET['info'] == "u") {
				echo "updadte";
				// $row = $dbh->query("UPDATE veiculo SET cnpj_empresa = $cnpj_empresa , marca = '$marca' ,modelo = '$modelo',pneususo= $pneususo,pneus=$pneus  WHERE placa ='$placa'")->fetch();
				// header('Location: buscaempresa.php?cnpj=' . $cnpj_empresa);
			}
			elseif ($_GET['info'] == "d") {
				echo "delete";
				// $row = $dbh->query("DELETE FROM veiculo WHERE placa ='$placa'")->fetch();
				// $row5 = $dbh->query("SELECT count(placa) FROM veiculo WHERE cnpj_empresa = $cnpj_empresa")->fetch();
				// // $dbh->closeCursor();
				// $row6 = $dbh->query("UPDATE empresa	SET nveiculo = $row5[0] WHERE cnpj = $cnpj_empresa")->fetch();
				// header('Location: buscaempresa.php?cnpj=' . $cnpj_empresa);
			}
		}
	}

		# Executa a query desejada

		if ($_GET['info'] == "u") {
			$row1 = $dbh->query("SELECT placa,cnpj_empresa,marca,modelo,pneususo,pneus FROM veiculo WHERE placa = '$id' LIMIT 1")->fetch();
			$row2 = $dbh->query("SELECT COUNT(cod) as pneus FROM pneu WHERE veiculo ='$id'")->fetch();
			$row3 = $dbh->query("SELECT COUNT(cod) as pneususo FROM pneu WHERE veiculo ='$id' AND status = 1")->fetch();
			$user = array('cod' => $row1['cod'],
				 'veiculo' => $row1['veiculo'],
				 'satus' => $row1['satus'],
				 'pos' => $row1['pos_veic'],
				 // 'pneususo' => $row3['pneususo'],
				 // 'pneus' => $row2['pneus'],
				 // 'disabled' => "disabled",
			);
		}elseif ($_GET['info'] == "c") {
			$row1 = $dbh->query("SELECT placa,cnpj_empresa,marca,modelo,pneususo,pneus FROM veiculo WHERE placa = '$id' LIMIT 1")->fetch();
			$user = array('cod' => $row1['cod'],
				 'veiculo' => $row1['veiculo'],
				 'satus' => $row1['satus'],
				 'pos' => $row1['pos_veic'],
				 // 'pneususo' => $row3['pneususo'],
				 // 'pneus' => $row2['pneus'],
			);
		}else{
			// $row = $dbh->query("SELECT placa,cnpj_empresa,marca,modelo FROM veiculo WHERE cnpj_empresa = $cnpj_empresa LIMIT 1")->fetch();
			$user = array('cod' => $cod,
				 'veiculo' => $veiculo,
				 'satus' => $status,
				 'pos' => $pos,
				 // 'pneususo' => 0,
				 // 'pneus' => 0,
				 // 'disabled' => "",
			 );
		}
//
	$optionSelction =  array();
	$option1 = array('value' => 'DE' ,
		'nome' => 'Dianteiro Esquerdo' );
//
	$option2 = array('value' => 'DD' ,
		'nome' => 'Dianteiro Direito' );

	$option3 = array('value' => '1TEE' ,
		'nome' => '1 Eixo Traseiro Esquerdo Externo' );
	//
	$option4 = array('value' => '1TEI' ,
		'nome' => '1 Eixo Traseiro Esquerdo Interno' );

	$option5 = array('value' => '1TDE' ,
		'nome' => '1 Eixo Traseiro Direito Externo' );

	$option6 = array('value' => '1TDI' ,
		'nome' => '1 Eixo Traseiro Direito Interno' );

	$option7 = array('value' => '2TEE' ,
		'nome' => '2 Eixo Traseiro Esquerdo Externo' );
	//
	$option8 = array('value' => '2TEI' ,
		'nome' => '2 Eixo Traseiro Esquerdo Interno' );

	$option9 = array('value' => '2TDE' ,
		'nome' => '2 Eixo Traseiro Direito Externo' );

	$option10 = array('value' => '2TDI' ,
		'nome' => '2 Eixo Traseiro Direito Interno' );

	$option11 = array(array('value' => '3TEE' ,
		'nome' => '3 Eixo Traseiro Esquerdo Externo' );

	$option12 = array('value' => '3TEI' ,
		'nome' => '3 Eixo Traseiro Esquerdo Interno' );

	$option13 = array('value' => '3TDE' ,
		'nome' => '3 Eixo Traseiro Direito Externo' );
	
	$option14 = array('value' => '3TDI' ,
		'nome' => '3 Eixo Traseiro Direito Interno' );
//
// array_push($optionSelction,$option1,$option2,$option3,$option4,$option5,$option6,
// 	$option7,$option8,$option9,$option10,$option11,$option12,$option13,$option14);


	# Exibe os registros na tela

	echo $twig->render('cadastrapneu1.html', array( "user" => $user,
		));

?>
