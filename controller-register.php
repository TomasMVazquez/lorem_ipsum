<?php

// VALIDACIONES --------------------------------------------------------------------REGISTER
  function registerValidate(){
    // Creo un array de errores vacío
    $errors = [];

    // Guardo lo que vino en post
    $user = trim($_POST['user']);
    $name = trim($_POST['name']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $country = $_POST['pais'];
    $psw = trim($_POST['psw']);
    $pswRepeat = trim($_POST['psw-repeat']);
    $avatar = $_FILES['avatar'];

    // Validamos nombre de usuario
    if ( empty($user)) {
      $errors['inUser'] = 'Debes completar un nombre de usuario';
    }elseif (getUserData($user)) {
      //uso la misma funcion que me trae el usuario de la base para validar si ya existe el dato
      $errors['inUser'] = 'Ese usuario ya existe, favor de elegir otro nombre de usuario';
    }

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
		} elseif ( getUserData($email) ) {
      //uso la misma funcion que me trae el usuario de la base para validar si ya existe el dato
			$errors['inEmail'] = 'Ese email ya esta registrado';
		}

    //Validamos el Pais
    if (empty($country)) {
      $errors['inCountry'] = 'Debes elegir tu pais';
    }

    // Validamos la pass
		if ( empty($psw) ) {
			$errors['inPsw'] = 'La contraseña no puede estar vacía';
		} elseif ( strlen($psw) < 6 ) {
			$errors['inPsw'] = 'La contraseña debe tener más de 5 caracteres';
		} elseif (strpos($psw," ") > 0) {
      $errors['inPsw'] = 'La contraseña no debe tener espacios';
    } elseif (strpos($psw,"DH") === false) {
      $errors['inPsw'] = 'La contraseña debe contener en algun lugar DH';
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
    unset($_POST['remember']);

		$_POST['psw'] = password_hash($_POST['psw'], PASSWORD_DEFAULT);
		$usersList[] = $_POST;

		// 3. Volver a guardar a todos los usuarios con éste último
		file_put_contents('data/users.json', json_encode($usersList,JSON_PRETTY_PRINT));
	}

 ?>
