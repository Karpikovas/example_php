<?php

class CreateController
{


  public function actionIndex(): bool
  {
    require_once(ROOT . '/views/create/index.php');
    return true;
  }

  public function actionCreate(): bool
  {
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $secondName = $_POST['secondname'];
      $patr = $_POST['patr'];
      $birthday = $_POST['birthday'];

      $errors = false;

      if (!Item::checkName($name)) {
        $errors[] = 'Error with name';
      }
      if (!Item::checkSecondName($secondName)) {
        $errors[] = 'Error with secondname';
      }
      if (!Item::checkPatr($patr)) {
        $errors[] = 'Error with patr';
      }
      if (!Item::checkBirthday($birthday)) {
        $errors[] = 'Error with birthday';
      }
      if ($errors == false) {
        Item::addItem($name, $secondName, $patr, $birthday);
        header('Location: /');
        return true;
//      } else {
//        foreach ($errors as $error) {
//          echo '<br/>' . $error;
//        }
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
