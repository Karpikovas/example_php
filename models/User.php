<?php


class User
{

  public static function checkUsername($username)
  {
    if (!preg_match('/^[a-zA-Z0-9]+_?[a-zA-Z0-9]+$/', $username)) {
      return false;
    }
      return true;
  }

  public static function checkPassword($password)
  {
    if (!preg_match('/^{5,20}$/', $password)) {
      return false;
    }
    return true;
  }

  public static function checkEmailExists($email)
  {
    return true;
  }

  public static function checkUsernameExists($username)
  {
    $db = Db::getConnection();
    $sql = $db->prepare('SELECT * FROM User WHERE username = :username;');
    $sql->bindParam(':username', $username, PDO::PARAM_STR);
    $sql->execute();
    $user = $sql->fetchAll(PDO::FETCH_ASSOC);

    if ($user) {
      return false;
    }

    return true;
  }

  public static function login($username, $password)
  {
    $db = Db::getConnection();
    $sql = $db->prepare('SELECT * FROM User WHERE username = :username and password = :password;');
    $sql->bindParam(':username', $username, PDO::PARAM_STR);
    $sql->bindParam(':password', $password, PDO::PARAM_STR);
    $sql->execute();
    $user = $sql->fetchAll(PDO::FETCH_ASSOC);

    //$hash = password_hash($password, PASSWORD_BCRYPT );

    //password_verify($password, $hash);

    //qwerty -> 123
    //qwertyABC -> alg1.234.ABC

    //qwerty -> 123
    //qwertyZXC -> alg1.345.ZXC



    if ($user) {
      self::setAuth($user);
      return true;
    }

    return false;
  }

  public static function register($username, $password, $email)
  {
    return true;
  }

  public static function checkAuth()
  {
    return true;
  }

  public static function Logout()
  {

  }

  public static function setAuth($user)
  {
    $user = array_shift($user);
    $_SESSION['user'] = $user['username'];
  }
}