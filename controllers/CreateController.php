<?php

class CreateController
{


  public function actionIndex(): bool
  {
    session_start();
    if (!empty($_SESSION["error"])) {
      $errors = $_SESSION["error"];
      unset($_SESSION["error"]);
    } else {
      $errors = "";
    }

    if (!empty($_SESSION["name"])) {
      $name = $_SESSION["name"];
      unset($_SESSION["name"]);
    } else {
      $name = "";
    }

    if (!empty($_SESSION["secondname"])) {
      $secondName = $_SESSION["secondname"];
      unset($_SESSION["secondname"]);
    } else {
      $secondName = "";
    }

    if (!empty($_SESSION["patr"])) {
      $patr = $_SESSION["patr"];
      unset($_SESSION["patr"]);
    } else {
      $patr = "";
    }
    if (!empty($_SESSION["birthday"])) {
      $birthday = $_SESSION["birthday"];
      unset($_SESSION["birthday"]);
    } else {
      $birthday = "";
    }

    require_once(ROOT . '/views/create/index.php');
    return true;
  }

  public function actionCreate(): bool
  {
    session_start();
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $secondName = $_POST['secondname'];
      $patr = $_POST['patr'];
      $birthday = $_POST['birthday'];

      $errors = false;

      if (!Item::checkName($name)) {
        $errors[] = 'Error with name <br/>';
      }
      if (!Item::checkSecondName($secondName)) {
        $errors[] = 'Error with secondname <br/>';
      }
      if (!Item::checkPatr($patr)) {
        $errors[] = 'Error with patr <br/>';
      }
      if (!Item::checkBirthday($birthday)) {
        $errors[] = 'Error with birthday <br/>';
      }
      if ($errors == false) {
        Item::addItem($name, $secondName, $patr, $birthday);
        header('Location: /');
        return true;
      } else {
        $_SESSION["name"] = $name;
        $_SESSION["secondname"] = $secondName;
        $_SESSION["patr"] = $patr;
        $_SESSION["birthday"] = $birthday;
        $_SESSION["error"] = implode($errors);
        header('Location: /create');
      }
    }
    return false;
  }

  public function actionErrors($errors)
  {
    require_once(ROOT . '/views/create/index.php');
    return true;
  }
}
