<?php
	if (isset($_GET['cod'])){
		$id = (int) $_GET['cod'];

	}else{
		$id = $_GET['id'];
	}

	require 'vendor/autoload.php';
	// Pegando o arquivo autoload da pasta vendor, para que possa utilizar o Twig

	$loader = new Twig_Loader_Filesystem('views');
	// Declarando a pasta views (que serão exibidas ao usar twig)

	$twig = new Twig_Environment($loader);
	// Carregando a pasta views
	// $link = mysqli_connect("sql110.epizy.com", "epiz_25916090", "JYCprYQD3l", "epiz_25916090_controlemicres");


	# Substitua abaixo os dados, de acordo com o banco criado
	$user = "epiz_25916090";
	$password = "JYCprYQD3l";
	$database = "epiz_25916090_controlemicres";

	# O hostname deve ser sempre localhost
	$hostname = "sql110.epizy.com";

	# Conecta com o servidor de banco de dados
	mysql_connect( $hostname, $user, $password ) or die( ' Erro na conexão ' );

	# Seleciona o banco de dados
	mysql_select_db( $database ) or die( 'Erro na seleção do banco' );

	# Executa a query desejada

	 // /*
	$query = "SELECT m.cod, m.medida, m.km, IFNULL((m.km - (SELECT m3.km FROM manutencao m3 WHERE m.id > m3.id AND m3.cod = m.cod ORDER BY m3.km DESC LIMIT 1 )),0) AS variacaokm,
	IFNULL((- m.medida + (SELECT m2.medida FROM manutencao m2 WHERE m.id > m2.id AND  m2.cod = m.cod ORDER BY m2.km DESC LIMIT 1 )),0) AS variacao,
	(m.medida - 3) AS falta
	FROM manutencao m WHERE m.cod = " . $id . "  ORDER BY m.km DESC";

	// ?$query = "SELECT cod, medida, km  FROM manutencao WHERE cod = 1234567890 ORDER BY medida ASC";
	//*/

	$result_query = mysql_query( $query ) or die(' Erro na query:' . $query . ' ' . mysql_error() );
	$result = mysql_query( $query ) or die(' Erro na query:' . $query . ' ' . mysql_error() );

/* select cod_Art, (sum(quant) - (select quant from ccartigos_stock where armazem = 4 and Cod_Art = '11430001'))  as 'quant'
from ccartigos_stock
where (armazem = 1 or Armazem = 2 or Armazem = 3) and Cod_Art = '11430001'
group by cod_art
order by cod_Art
*/
	# Exibe os registros na tela
	// while ($row = mysql_fetch_array( $result_query )) { print " -- " . $row[medida] . " -- " . $row[km]."\n"; }
	$userAll = array();

	while ($row = mysql_fetch_array( $result_query )){
		if ($row[variacaokm]!= 0) {
			$media = $row[variacao]/$row[variacaokm];
			$x = ($row[falta] / $media) + $row[km];
		}
		else {
			$media = " - ";
			$x = " - ";
		}

		$medicao = array(
			'cod'=> $row[cod],
			'medida'=> $row[medida],
			'km'=> $row[km],
			'variacaomedida'=> $row[variacao],
			'variacaokm'=> $row[variacaokm],
			'media' => $media,
			'faltakm'=> $row[falta],
			'kmfinal'=> $x,
			 );
			 array_push($userAll, $medicao);
		}
		$kmfinal = $userAll[0]['kmfinal'];
		$codfinal = $userAll[0]['cod'];
		$mediadesgaste = $userAll[0]['media'];

	# Exibe os registros na tela
	// while ($row = mysql_fetch_array( $result_query )) { print " -- " . $row[medida] . " -- " . $row[km]."\n"; }

	echo $twig->render('manutencao.html', array( "manutencao" => $userAll,
	'kmfinal' => $kmfinal,
	'codfinal' => $codfinal,
	'mediadesgaste' => $mediadesgaste,
	'cod' => $id,
		));
	// Chamando a página "hello.html" que está em views

?>
