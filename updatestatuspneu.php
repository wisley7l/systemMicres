<?php
include('js/decode.php');

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
    // $row6 = $dbh->query("UPDATE pneu	SET status = $status WHERE cod = $cod")->fetch();
    // header('Location: buscaempresa.php?cnpj=' . $cnpj_empresa);
    //
  }
}

?>
