<?php

class Item
{

  //OK
  public static function getItemsList(): array
  {
    $db = Db::getConnection();

    $sql = 'SELECT * FROM item';
    $result = $db->query($sql);

  /*  $i = 0;
    $items = []; // array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
      $items[] = $row;

//      $items[$i]['id'] = $row['id'];
//      $items[$i]['name'] = $row['name'];
//      $items[$i]['secondname'] = $row['secondname'];
//      $items[$i]['patr'] = $row['patr'];
//      $items[$i]['birthday'] = $row['birthday'];
      $i++;
    }
    print_r($items);
  */
    $items = $result->fetchAll(PDO::FETCH_ASSOC);

    // $result->closeCursor();

    return $items;
  }

  //OK
  public static function getItemByID(int $itemID): array
  {
    $db = Db::getConnection();
    $sql = $db->prepare('SELECT * FROM item WHERE id = :id');
    $sql->bindParam(':id', $itemID, PDO::PARAM_INT);


    $i = 0;
    $sql->execute();
    $item = array();
    while ($row = $sql->fetch())
    {
      $item[$i]['id'] = $row['id'];
      $item[$i]['name'] = $row['name'];
      $item[$i]['secondname'] = $row['secondname'];
      $item[$i]['patr'] = $row['patr'];
      $item[$i]['birthday'] = $row['birthday'];
      $i++;
    }

    return $item;
  }

  public static function deleteItem(int $itemID)
  {
    $db = Db::getConnection();
    $sql = $db->prepare('DELETE FROM item WHERE id = :id');
    $sql->bindParam(':id', $itemID, PDO::PARAM_INT);
    return $sql->execute();
  }

  public static function addItem(string $name, string $secondName, string $patr, string $birthday)
  {
    $db = Db::getConnection();
    $sql = $db->prepare('INSERT INTO item (name, secondname, patr, birthday) VALUES (:name, :secondname, :patr, :birthday);');

    $sql->bindParam(':name', $name, PDO::PARAM_STR);
    $sql->bindParam(':secondname', $secondName, PDO::PARAM_STR);
    $sql->bindParam(':patr', $patr, PDO::PARAM_STR);
    $sql->bindParam(':birthday', $birthday, PDO::PARAM_STR);



    return $sql->execute();
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
