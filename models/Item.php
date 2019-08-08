<?php

class Item
{


  public static function getItemsList(): array
  {
//    return libJSON::getArray();
    $db = Db::getConnection();

    $sql = 'SELECT * FROM item';
    $result = $db->query($sql);

    $i = 0;
    $items = array();
    while ($row = $result->fetch())
    {
      $items[$i]['id'] = $row['id'];
      $items[$i]['name'] = $row['name'];
      $items[$i]['secondname'] = $row['secondname'];
      $items[$i]['patr'] = $row['patr'];
      $items[$i]['birthday'] = $row['birthday'];
      $i++;
    }
    return $items;
  }

  public static function getItemByID(int $itemID): array
  {
//    $item = array_filter(
//        libJSON::getArray(),
//        function ($var) use ($itemID) {
//          return $var['id'] == $itemID;
//        }
//    );
//    return $item;
    $db = Db::getConnection();

    $sql = $db->prepare('SELECT * FROM item WHERE id = :id');
    $sql->bindParam(':id', $itemID, PDO::PARAM_INT);
    $sql->execute();
    $item = $sql->fetch();

//    foreach($item as $raw)
//      echo $raw.'<br/>';
//
  print_r($item);

//    $result = $db->query($sql);
//
//    $i = 0;
//    $items = array();
//    while ($row = $result->fetch())
//    {
//      $items[$i]['id'] = $row['id'];
//      $items[$i]['name'] = $row['name'];
//      $items[$i]['secondname'] = $row['secondname'];
//      $items[$i]['patr'] = $row['patr'];
//      $items[$i]['birthday'] = $row['birthday'];
//      $i++;
//    }
    return $item;
  }

  public static function deleteItem(int $itemID): void
  {
    $items = libJSON::getArray();
    $i = 0;
    foreach ($items as $item) {
      if ($item[id] == $itemID) {
        unset($items[$i]);
      }
      $i++;
    }
    $items = array_values($items);
    libJSON::saveArray($items);
  }

  public static function addItem(string $name, string $secondName, string $patr, string $birthday): void
  {
    $item = [
        'id' => random_int(0, 1000),
        'name' => $name,
        'secondname' => $secondName,
        'patr' => $patr,
        'birthday' => $birthday
    ];

    $items = libJSON::getArray();
    $items[] = $item;
    libJSON::saveArray($items);

  }

  public static function checkName(string $name): bool
  {
    if (!preg_match('/^[a-z]{5,20}$/', $name)) {
      return false;
    }
    return true;
  }

  public static function checkSecondName(string $secondName): bool
  {
    if (!preg_match('/^[a-z]{5,20}$/', $secondName)) {
      return false;
    }
    return true;
  }

  public static function checkPatr(string $patr): bool
  {
    if (!preg_match('/^[a-z]{5,20}$/', $patr)) {
      return false;
    }
    return true;
  }

  public static function checkBirthday(string $birthday): bool
  {
    if (!strlen($birthday)) {
      return false;
    }
    return true;
  }

}
