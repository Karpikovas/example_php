<?php

class SiteController
{

  public function actionIndex(): bool
  {
    $items = array();
    $items = Item::getItemsList();

    $header = ["ID", "Name", "SecondName", "Patr", "Birthday", "Delete"];

    require_once(ROOT . '/views/site/index.php');

    return true;
  }

}
