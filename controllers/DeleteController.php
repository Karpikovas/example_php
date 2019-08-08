<?php

class DeleteController
{
  public function actionAsk(int $itemID): bool
  {
    $header = ["ID", "Name", "SecondName", "Patr", "Birthday"];
    $items = Item::getItemByID($itemID);



    if (count($items) == 0) {
      header('Location: /error');
      return false;
    }

    require_once(ROOT . '/views/delete/index.php');
    return true;
  }

  public function actionProcess(int $itemID): bool
  {
    if (isset($_POST['delete'])) {
      Item::deleteItem($itemID);
    }
    header('Location: /');
    return true;
  }
}
