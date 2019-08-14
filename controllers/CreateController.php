<?php

class CreateController
{


  public function actionIndex(): bool
  {
    //start_session();



    session_start();

    if (!$_SESSION['user']) {
      header('Location: /login');
    }

    $name = $_POST['name'];
    $secondName = $_POST['secondname'];
    $patr = $_POST['patr'];
    $birthday = $_POST['birthday'];

    if (isset($_POST['submit'])) {
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
      }
    }
    $errors = implode($errors);

    require_once(ROOT . '/views/create/index.php');
    return false;
  }

}
