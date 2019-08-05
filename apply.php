<?php

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
    require 'create.php';
    exit;
  } else {
    $myfile = "data.json";
    $arr_data = array();

    try
    {
      $jsondata = file_get_contents($myfile);
      $arr_data = json_decode($jsondata, true);
      $arr_data[] = [
          'name' => $_POST['name'],
          'secondname' => $_POST['secondname'],
          'patr' => $_POST['patr'],
          'birthday' => $_POST['birthday'],
          'id' => random_int(0, 1000)
      ];

      $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

      if(file_put_contents($myfile, $jsondata)) {
        ob_clean();
        require 'index.php';
        exit;
      } else {
        echo "error";
      }
    }
    catch (Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
  }
?>
