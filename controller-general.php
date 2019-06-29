<?php
//********************************************COMENZAMOS SESSION
session_start();
//***************************************************FUNCION PARA VALIDAR COOKIE
if (isset($_COOKIE['user'])) {
  $user = getUserData($_COOKIE['user']);
  // 1. Sacamos del array la contraseña
  unset($user['psw']);
  // 2. Guardo en SESSION al usuario
  $_SESSION['userLogged'] = $user;
}

// ********************************************FUNCIONES PARA LOGEO
function isLogged() {
  return isset($_SESSION['userLogged']);
}

function login($user) {
  // 1. Sacamos del array la contraseña
  unset($user['psw']);

  // 2. Guardo en SESSION al usuario
  $_SESSION['userLogged'] = $user;

  // 3. Redirecciono al perfil
  header('location: index.php');
  exit;
}

// ********************************************FUNCIONES PARA VALIDAR A USUARIOS
function getUsers(){
  return  json_decode(file_get_contents('data/users.json'), true);
}

function getUserData($emailOrUser){
  $users = getUsers();
  foreach ($users as $oneUser) {
    if ($oneUser['email'] == $emailOrUser || $oneUser['user'] == $emailOrUser) {
      return $oneUser;
    }
  }
}

//***************************************************TRAIGO EL RESTO DE LAS FUNCIONES
require_once 'controller-login.php';
require_once 'controller-register.php';
require_once 'controller-perfil.php';
 ?>
