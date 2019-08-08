<?php

class SiteController
{

    /**
     * @return bool
     */
    public function actionIndex()
    {
        $items = array();
        $items = Item::getItemsList();

        $header = ["ID", "Name", "SecondName", "Patr", "Birthday", "Delete"];

        require_once(ROOT . '/views/site/index.php');

        return true;
    }

}
