<?php

  // VALIDACIONES --------------------------------------------------------------------PERFIL
    function profileUpdateValidate(){
      // Creo un array de errores vacío
      $errors = [];

      // Guardo lo que vino en post en la posición 'name'
      $name = trim($_POST['name']);
      $lastName = trim($_POST['lastName']);
      $email = trim($_POST['email']);
      $country = $_POST['pais'];

      $avatar = $_FILES['avatar'];

      // Validamos nombres
  		if ( empty($name)) {
  			$errors['inName'] = 'Debes completar tu nombre';
  		}
      // Validamos apellido
      if (empty($lastName)) {
        $errors['inLastName'] = 'Debes completar tu apellido';
      }

      // Validamos el email
  		if ( empty($email) ) {
  			$errors['inEmail'] = 'El campo correo electrónico es obligatorio';
  		} elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        $errors['inEmail'] = 'Escribí un formato de correo válido';
  		} elseif (emailExistOtherUser($email)) {
        $errors['inEmail'] = 'Ese email ya esta registrado bajo otro usuario';
      }

      //Validamos la Imagen
      // SI NO subieron un archivo
  		if ($avatar['error'] = UPLOAD_ERR_OK) {
  			$ext = pathinfo($avatar['name'], PATHINFO_EXTENSION);
  			if ( $ext != 'jpg' && $ext != 'png' && $ext != 'gif' ) {
  				$errors['inAvatar'] = 'Las extensiones permitidas son JPG, PNG y GIF';
  			}
  		}

      return $errors;
    }

    //Funcion para validar si el email existe bajo otro usuario
    function emailExistOtherUser($email){
      $usersList = getUsers();
      foreach ($usersList as $oneUser) {
        if ($oneUser['user']!=$_SESSION['userLogged']['user']) {
          if ($oneUser['email']==$email) {
            return true;
          }
        }
      }
    }

    //Funcion para actualizar usuario
    function updateUser($userName) {
      // 1. Leemos el archivo de usuarios que está en JSON
      $usersList = getUsers();
      // 2. Buscamos el usuario a Actualizar
      foreach ($usersList as $key => $user) {
        if ($user['user'] == $userName) {
          $usersList[$key]['name'] = $_POST['name'];
          $usersList[$key]['lastName'] = $_POST['lastName'];
          $usersList[$key]['email'] = $_POST['email'];
          $usersList[$key]['pais'] = $_POST['pais'];
          $usersList[$key]['categorias'] = $_POST['categorias'];
          $usersList[$key]['notificaciones'] = $_POST['notificaciones'];
          $usersList[$key]['imgProfile'] = $_POST['imgProfile'];
          break;
        }
      }
      // 3. Volver a guardar a todos los usuarios con éste último
      file_put_contents('data/users.json', json_encode($usersList,JSON_PRETTY_PRINT));
    }

    //Hacemos un relogin
    function reLogin($user) {
      // 1. Sacamos del array la contraseña
      unset($user['psw']);

      // 2. Guardo en SESSION al usuario
      $_SESSION['userLogged'] = $user;

      // 3. Redirecciono al perfil
      header('location: perfil.php');
      exit;
    }
// funcion para validar re-pass
    function validateModifyPass(){
      $errorsInRepass = [];

      $oldPsw = $_POST['psw'];
      $newPsw = $_POST['newPsw'];
      $newPswRepeat = $_POST['newPsw-repeat'];

      $user = $_SESSION['userLogged'];

      if (empty ($oldPsw)){
        $errorsInRepass['inOldPsw']= 'La contraseña no puede estar vacía';
      }elseif(!validatePsw($user['email'], $oldPsw)){
        $errorsInRepass['inOldPsw']= 'Su contraseña original no coincide';
      }

      if ( empty($newPsw) ) {
        $errorsInRepass['inNewPsw'] = 'La contraseña no puede estar vacía';
      } elseif ( strlen($newPsw) < 6 ) {
        $errorsInRepass['inNewPsw'] = 'La contraseña debe tener más de 5 caracteres';
      } elseif (strpos($newPsw," ") > 0) {
        $errorsInRepass['inNewPsw'] = 'La contraseña no debe tener espacios';
      } elseif (strpos($newPsw,"DH") === false) {
        $errorsInRepass['inNewPsw'] = 'La contraseña debe contener en algun lugar DH';
      }
      if (empty($newPsw)){
        $errorsInRepass['inRepeatPsw'] = 'La contraseña no puede estar vacía';
      }elseif($newPsw!=$newPswRepeat){
        $errorsInRepass['inRepeatPsw']= 'Las contraseñas no coinciden';
      }

          return $errorsInRepass;
    }

    function updatePass() {
      $newPsw = password_hash($_POST['newPsw'], PASSWORD_DEFAULT);
      // 1. Leemos el archivo de usuarios que está en JSON
      $usersList = getUsers();

      // 2. Buscamos el usuario a Actualizar
      foreach ($usersList as $key => $user) {
         if ($user['user'] == $_SESSION['userLogged']['user']) {
          $usersList[$key]['psw'] = $newPsw;
          break;
        }
      }

      // 3. Volver a guardar a todos los usuarios con éste último
      file_put_contents('data/users.json', json_encode($usersList,JSON_PRETTY_PRINT));
    }

 ?>
