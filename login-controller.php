<?php
require_once 'controller.php';

// VALIDACIONES --------------------------------------------------------------------LOG IN

function logInValidate(){
  // Creo un array de errores vacío
  $errors = [];

  //Saco datos
  $emailOrUser = trim($_POST['emailOrUser']);
  $psw = trim($_POST['psw']);

  if (!userExists($emailOrUser)) {
    $errors['inEmailUser'] = 'Ese email o usuario no existe en nuestra base de Datos';
  }else if(!validatePsw($emailOrUser,$psw)){
    $errors['inPsw'] = 'Su contraseña no coincide, intentelo nuevamente';
  }

  return $errors;
}

function userExists($emailOrUser){
  $users = getUsers();
  //Recorremos todos los usuarios
  foreach ($users as $oneUser) {
    //Validamos si el email o el usuario existe
    if ($oneUser['email'] == $emailOrUser || $oneUser['user'] == $emailOrUser) {
      return true;
    }
  }
  return false;
}

function validatePsw($emailOrUser,$psw){
  $users = getUsers();
  foreach ($users as $oneUser) {
    //Validamos si el email o el usuario existe
    if ($oneUser['email'] == $emailOrUser || $oneUser['user'] == $emailOrUser) {
      if (password_verify($psw,$oneUser['psw'])){
        return true;
      }
    }
  }
  return false;
}



 ?>
