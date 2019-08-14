<?php


class AuthController
{
  public function actionLogin(): bool
  {
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (isset($_POST['submit'])) {
      if (User::login($username, $password)) {
        header('Location: /');
        return true;
      } else {
        $error = 'Incorrect username or password! <br/><br/>';
      }
    }

    require_once(ROOT . '/views/auth/login.php');
    return false;
  }

  public function actionRegister(): bool
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordAgain = $_POST['password'];
    $email = $_POST['email'];

    $errors = false;

    if (isset($_POST['submit'])) {
      if (!User::checkUsernameExists($username)) {
        $errors[] = 'User with such USERNAME exists!<br/>';
      }
      if (!User::checkUsername($username)) {
        echo rrr;
        $errors[] = 'Error with USERNAME!<br/>';
      }

    }

    $errors = implode($errors);
    require_once(ROOT . '/views/auth/register.php');
    return true;
  }

  public function actionLogout(): bool
  {
    session_start();
    $_SESSION['user'] = '';
    session_destroy();
    header('Location: /login');
    return true;
  }
}