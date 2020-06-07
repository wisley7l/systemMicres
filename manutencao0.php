<!DOCTYPE html>
<html>
<head>
	<title>Crud Wordpress</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Cod</th>
          <th scope="col">Medida</th>
					<th scope="col">KM</th>
					<th scope="col">Variacao</th>
					<th scope="col">Variacao KM</th>
					<th scope="col">Media (mm/Km)</th>
					<th scope="col">Diferença (mm)</th>
					<th scope="col">Troca de Pneu no Km</th>
        </tr>
      </thead>

			<?php
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
			(m.medida - 3) AS v
			FROM manutencao m WHERE m.cod = 1234567890  ORDER BY m.km DESC";

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


			?>
      <tbody>
        <?php

					while ($row = mysql_fetch_array( $result_query )){ ?>
          <tr>
						<th scope="row"><?php echo $row[cod];?></th>
            <th scope="row"><?php echo $row[medida];?></th>
            <td><?php echo $row[km];?></td>
						<td><?php echo $row[variacao];?></td>
						<td><?php echo $row[variacaokm];?></td>
						<?php
							if ($row[variacaokm]!= 0) {
								$media = $row[variacao]/$row[variacaokm];
								$x = ($row[v] / $media) + $row[km];
							}
							else {
								$media = " - ";
								$x = " - ";
							}

						?>
						<td><?php echo $media;?></td>
						<td><?php echo $row[v];?></td>
						<td><?php echo $x;?></td>


          </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
