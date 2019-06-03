<?php

// VALIDACIONES --------------------------------------------------------------------LOG IN
  function getUsers(){
    return  json_decode(file_get_contents('data/users.json'), true);
  }

  function getUserData($email){
    $users = getUsers();
		foreach ($users as $oneUser) {
			if ($oneUser['email'] == $email) {
				return $oneUser;
			}
    }
  }

  function userExists($email){
		$users = getUsers();
		foreach ($users as $oneUser) {
			if ($oneUser['email'] == $email) {
				return true;
			}
		}
		return false;
  }

  function validatePsw($email,$psw){
    $users = getUsers();
		foreach ($users as $oneUser) {
			if ($oneUser['email'] == $email) {
				if ($oneUser['psw'] == password_hash($psw, PASSWORD_DEFAULT)){
          return true;
        }
			}
		}
    return false;
  }

  function logInValidate(){
    // Creo un array de errores vacío
		$errors = [];

    //Saco datos
    $email = trim($_POST['email']);
    $psw = trim($_POST['psw']);

    if (!userExists($email)) {
      $errors['inEmail'] = 'Ese correo electrónico no existe en nuestra base de Datos';
    }else if(!validatePsw($email,$psw)){
      $errors['inPsw'] = 'Su contraseña no coincide, intentelo nuevamente';
    }

    return $errors;
  }
// VALIDACIONES --------------------------------------------------------------------REGISTER
  function registerValidate(){
    // Creo un array de errores vacío
    $errors = [];

    // Guardo lo que vino en post en la posición 'name'
    $name = trim($_POST['name']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $psw = trim($_POST['psw']);
    $pswRepeat = trim($_POST['psw-repeat']);
    $avatar = $_FILES['avatar'];

    // Validamos nombres
		if ( empty($name) || empty($lastName)) {
			$errors['inName'] = 'Debes completar tu nombre y apellido';
		}

    // Validamos el email
		if ( empty($email) ) {
			$errors['inEmail'] = 'El campo correo electrónico es obligatorio';
		} elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
      $errors['inEmail'] = 'Escribí un formato de correo válido';
		} elseif ( userExists($email) ) {
			$errors['inEmail'] = 'Ese email ya esta registrado';
		}

    // Validamos la pass
		if ( empty($psw) ) {
			$errors['inPsw'] = 'La contraseña no puede estar vacía';
		} elseif ( strlen($psw) < 5 ) {
			$errors['inPsw'] = 'La contraseña debe tener 5 letras o más';
		}

		// Validamos la repeticion de la pass
		if ( empty($pswRepeat) ) {
			$errors['inPswRepeat'] = 'Debes escribir la contraseña de nuevo';
		} elseif ( $psw != $pswRepeat ) {
			$errors['inPswRepeat'] = 'Las contraseñas no coinciden';
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


  function saveImage($file) {
		$name = $file['name'];
		$ext = pathinfo($name, PATHINFO_EXTENSION);
		$finalPath = 'data/avatars/' . uniqid('img-') . "." . $ext;
		$tempFile = $file['tmp_name'];
		move_uploaded_file($tempFile,  $finalPath);
    return $finalPath;
	}

  function saveUser() {
		// 1. Leemos el archivo de usuarios que está en JSON
		$usersList = getUsers();

		// 2. Agregar la información del usuario al array de usuarios
		// 2.a Lo 1ero es sacar la posición de rePassword
		// 2.b Hasheamos la contraseña
		unset($_POST['psw-repeat']);
		$_POST['psw'] = password_hash($_POST['psw'], PASSWORD_DEFAULT);
		$usersList[] = $_POST;

		// 3. Volver a guardar a todos los usuarios con éste último
		file_put_contents('data/users.json', json_encode($usersList));
	}


 ?>
