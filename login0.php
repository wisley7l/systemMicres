<?php
require 'vendor/autoload.php';
include('js/decode.php');
// Pegando o arquivo autoload da pasta vendor, para que possa utilizar o Twig

$loader = new Twig_Loader_Filesystem('views');
// Declarando a pasta views (que serão exibidas ao usar twig)

$twig = new Twig_Environment($loader);
// Carregando a pasta views

if (!empty($_POST) AND (empty($_POST['user']) OR empty($_POST['pass']))){
  header("Location: /erro.php");
  exit;
}

# Substitua abaixo os dados, de acordo com o banco criado
# Substitua abaixo os dados, de acordo com o banco criado
$user = "padmin";
$password = "nJKSQj4xtAD8OyLw";
$database = "controleMicres";

# O hostname deve ser sempre localhost
$hostname = "localhost";
# Conecta com o servidor de banco de dados
$dbh = new PDO('mysql:host='.$hostname .';dbname='. $database, $user, $password);

if (!empty($_POST) AND (empty($_POST['user']) OR empty($_POST['pass']))){
	header("Location: /erro.php");
	exit;
}
else {
	$user = (int)$_POST['user'];
	$row = $dbh->query("SELECT cpf,conf_senha,senha FROM funcionario WHERE cpf = $user LIMIT 1")->fetch();
	echo json_encode(array("user" => $row[0], "conf" => $row[1]),"senha" =>$row[2],);
	// $row = $dbh->query("INSERT INTO veiculo (placa,cnpj_empresa,marca,modelo,pneususo,pneus) VALUES ('$placa',$cnpj_empresa,'$marca','$modelo',0,0)")->fetch();
}

?>
