<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08.08.2019
 * Time: 11:49
 */

class ErrorController
{
    public function actionIndex()
    {
        require_once(ROOT . '/views/error/index.php');
        return true;
    }
}
