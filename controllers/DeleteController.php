<?php

class DeleteController
{
    public function actionAsk($itemID)
    {
        $header = ["ID", "Name", "SecondName", "Patr", "Birthday"];
        $items = Item::getItemByID($itemID);

        require_once(ROOT . '/views/delete/index.php');
    }
    public function actionProcess($itemID)
    {
        if (isset($_POST['delete']))
        {
            Item::deleteItem($itemID);
        }
        header('Location: /');
    }
}
