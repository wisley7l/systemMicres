<?php
function getUserLogin()
{
  return array(
    'user_id' => $_SESSION['user_id'],
    'user_name' => $_SESSION['user_name'] ,
    'name' => $_SESSION['name'],
    'tipo' => $_SESSION['tipo'],
  );
}

function createSession($id,$email,$name,$tipo)
{
	$id_session = $id;
  session_id($id_session);
  session_start();
  // echo $credits;
  $_SESSION['user_id'] = $id;
  $_SESSION['user_name'] = $email;
  $_SESSION['name'] = $name;
  $_SESSION['login'] = true;
  $_SESSION['tipo'] = $tipo;
  if (!is_writable(session_save_path())) {
  //echo 'Session path "'.session_save_path().'" is not writable for PHP!';
	echo json_encode(array("login" => "erro"));
  }
  else {
    echo json_encode(array("login" => "ok"));
  }
}

 ?>
