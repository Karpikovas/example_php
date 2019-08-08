<?php

class ErrorController
{
  public function actionIndex(): bool
  {
    require_once(ROOT . '/views/error/index.php');
    return true;
  }
}
