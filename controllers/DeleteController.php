<?php

class DeleteController
{
  public function actionAsk(int $itemID): void
  {
    $header = ["ID", "Name", "SecondName", "Patr", "Birthday"];
    $items = Item::getItemByID($itemID);

    if (count($items) == 0) {
      header('Location: /error');
    }

    require_once(ROOT . '/views/delete/index.php');
  }

  public function actionProcess(int $itemID): void
  {
    if (isset($_POST['delete'])) {
      Item::deleteItem($itemID);
    }
    header('Location: /');
  }
}
