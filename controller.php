<?php
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

function validateCookie(){
  if (isset($_COOKIE['user'])) {
    $_SESSION = getUserData($_COOKIE['user']);
  }
}

 ?>
