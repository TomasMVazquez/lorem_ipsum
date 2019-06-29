<?php

// VALIDACIONES --------------------------------------------------------------------LOG IN
function logInValidate(){
  // Creo un array de errores vacío
  $errors = [];

  //Saco datos
  $emailOrUser = trim($_POST['emailOrUser']);
  $psw = trim($_POST['psw']);

  //Valido datos ingresados
  if (!userExists($emailOrUser)) {
    $errors['inEmailUser'] = 'Ese email o usuario no existe en nuestra base de Datos';
  }else if(!validatePsw($emailOrUser,$psw)){
    $errors['inPsw'] = 'Su contraseña no coincide, intentelo nuevamente';
  }

  return $errors;
}

function userExists($emailOrUser){
  //Como ya tengo una funcion que me busca por usuario, repito y me fijo si trae algo
  if (getUserData($emailOrUser)) {
    return true;
  }else {
    return false;
  }
}

function validatePsw($emailOrUser,$psw){
  //Como ya tengo una funcion que me trae el usuario
  $oneUser = getUserData($emailOrUser);
  //Reviso psw
  if (password_verify($psw,$oneUser['psw'])){
    return true;
  }else {
    return false;
  }
}

 ?>
