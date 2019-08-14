<?php

class SiteController
{

  public function actionIndex(): bool
  {
    session_start();

    if (!$_SESSION['user']) {
      header('Location: /login');
    }

    $items = Item::getItemsList();
    $header = ["ID", "Name", "SecondName", "Patr", "Birthday", "Delete"];

    require_once(ROOT . '/views/site/index.php');
    return true;
  }

}
