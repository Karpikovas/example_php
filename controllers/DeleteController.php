<?php

class DeleteController
{
  public function actionAsk(int $itemID): bool
  {
    session_start();

    if (!$_SESSION['user']) {
      header('Location: /login');
    }

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
    session_start();

    if (!$_SESSION['user']) {
      header('Location: /login');
    }

    if (isset($_POST['delete'])) {
      Item::deleteItem($itemID);
    }
    header('Location: /');
    return true;
  }
}
