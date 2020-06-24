<?php
function getUserLogin()
{
  return array(
    'user_id' => $_SESSION['user_id'],
    'user_name' => $_SESSION['user_name'] ,
    'name' => $_SESSION['name'],
    'tipo' => $_SESSION['tipo'],
  );

 ?>
