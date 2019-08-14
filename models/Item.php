<?php

class Item
{

  public static function getItemsList(): array
  {
    $db = Db::getConnection();

    $sql = 'SELECT * FROM item';
    $result = $db->query($sql);
    $items = $result->fetchAll(PDO::FETCH_ASSOC);

    return $items;
  }

  public static function getItemByID(int $itemID): array
  {
    $db = Db::getConnection();
    $sql = $db->prepare('SELECT * FROM item WHERE id = :id');
    $sql->bindParam(':id', $itemID, PDO::PARAM_INT);
    $sql->execute();
    $item = $sql->fetchAll(PDO::FETCH_ASSOC);

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
