<?php
  include 'lib/libjson.php';

  $name = $_POST['name'];
  $secondname = $_POST['secondname'];
  $patr = $_POST['patr'];
  $birthday = $_POST['birthday'];
  $flag = true;

  if (!preg_match('/^[a-z]{2,20}$/', $name))
  {
    echo "Error with name";
    echo "<br>";
    $flag = false;
  }
  if (!preg_match('/^[a-z]{2,20}$/', $secondname))
  {
    echo "Error with secondname";
    echo "<br>";
    $flag = false;
  }
  if (!preg_match('/^[a-z]{2,20}$/', $patr))
  {
    echo "Error with patr";
    echo "<br>";
    $flag = false;
  }
  if (!strlen($birthday)) {
    $flag = false;
  }

  if (!$flag) {
    header ("Location: create.php");
  } else {
    $item = [
          'name' => $_POST['name'],
          'secondname' => $_POST['secondname'],
          'patr' => $_POST['patr'],
          'birthday' => $_POST['birthday'],
          'id' => random_int(0, 1000)
      ];
    addItem($item);
    header ("Location: index.php");
  }
?>
