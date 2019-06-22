<?php
require_once 'controller.php';

  // VALIDACIONES --------------------------------------------------------------------PERFIL
    function profileUpdateValidate(){
      // Creo un array de errores vacío
      $errors = [];

      // Guardo lo que vino en post en la posición 'name'
      $name = trim($_POST['name']);
      $lastName = trim($_POST['lastName']);
      $email = trim($_POST['email']);

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

    function updateUser() {
      // 1. Leemos el archivo de usuarios que está en JSON
      $usersList = getUsers();

      // 2. Buscamos el usuario a Actualizar

      foreach ($usersList as $key => $user) {
        if ($user['user'] == $_SESSION['user']) {
          $usersList[$key]['name'] = $_POST['name'];
          $usersList[$key]['lastName'] = $_POST['lastName'];
          $usersList[$key]['email'] = $_POST['email'];
          $usersList[$key]['categorias'] = $_POST['categorias'];
          $usersList[$key]['notificaciones'] = $_POST['notificaciones'];
          $usersList[$key]['imgProfile'] = $_POST['imgProfile'];
          break;
        }
      }

      // 3. Volver a guardar a todos los usuarios con éste último
      file_put_contents('data/users.json', json_encode($usersList));
    }

    function validateModifyPass(){
      //Validar que la contrasena actual sea igual a la que se encuentra en el JsonSerializable
      //Si esta ok tiene que seguir con el updatePass
      //Sino tirar error y que lo muestre en el form

    }

    function updatePass() {
      $newPsw = password_hash($_POST['psw'], PASSWORD_DEFAULT);
      // 1. Leemos el archivo de usuarios que está en JSON
      $usersList = getUsers();

      // 2. Buscamos el usuario a Actualizar
      foreach ($usersList as $key => $user) {
        if ($user['user'] == $_SESSION['user']) {
          $usersList[$key]['psw'] = $newPsw;
          break;
        }
      }

      // 3. Volver a guardar a todos los usuarios con éste último
      file_put_contents('data/users.json', json_encode($usersList));
    }

 ?>
