<?php

class libJSON
{

  private static $myFile = __DIR__ . "/../db/data.json";
  private static $jsondata;

  public static function getArray(): array
  {
    self::$jsondata = file_get_contents(self::$myFile);
    return json_decode(self::$jsondata, true);
  }

  public static function saveArray($newArray): void
  {
    self::$jsondata = json_encode($newArray, JSON_PRETTY_PRINT);
    file_put_contents(self::$myFile, self::$jsondata);
  }
}