<?php


class Db
{

  private static $connection = null;

  public static function getConnection()
  {
    if (!self::$connection) {

      $paramsPath = ROOT . '/config/db_config.php';
      $params = include($paramsPath);

      $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
      self::$connection = new PDO($dsn, $params['user'], $params['password']);
      self::$connection->exec("set names utf8");
    }

    return self::$connection;
  }

}