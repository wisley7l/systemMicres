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
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Criado</th>
        </tr>
      </thead>
      <?php
      global $wpdb;

      $resultado = $wpdb->get_results("SELECT * FROM wp_users  ORDER BY ID ASC");

      ?>
      <tbody>
        <?php foreach ($resultado as $valor): ?>
          <tr>
            <th scope="row"><?php echo $valor->ID;?></th>
            <td><?php echo $valor->user_login;?></td>
            <td><?php echo $valor->user_email;?></td>
            <td><?php echo date('d/m/Y H:m:s', strtotime($valor->user_registered));?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>