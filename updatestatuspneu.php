<?php
include('js/decode.php');

# Substitua abaixo os dados, de acordo com o banco criado
$user = "padmin";
$password = "nJKSQj4xtAD8OyLw";
$database = "controleMicres";

# O hostname deve ser sempre localhost
$hostname = "localhost";
# Conecta com o servidor de banco de dados
$dbh = new PDO('mysql:host='.$hostname .';dbname='. $database, $user, $password);

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
    $status = (int)$pieces[2];
    echo "<p>$cod</p>";
    echo "<p>$status</p>";
    $row = $dbh->query("SELECT v.placa FROM pneu p,veiculo v	WHERE p.cod = '$cod' AND v.placa = p.veiculo LIMIT 1")->fetch();
    // echo "<p>$row[0]</p>";
    $row2 = $dbh->query("UPDATE pneu	SET status = $status WHERE cod = $cod")->fetch();
    $row3 = $dbh->query("SELECT count(p.cod) FROM pneu p,veiculo v	WHERE p.status = 1 AND v.placa = $row[0] LIMIT 1")->fetch();
    $row4 = $dbh->query("UPDATE veiculo	SET pneususo = $row3[0] WHERE placa = $row[0]")->fetch();
    header('Location: buscaveiculo.php?placa=' . $row[0]);
    //
  }
}

?>
