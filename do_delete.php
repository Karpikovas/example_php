<?php
  if(isset($_POST['cancel'])){
    ob_clean();
    require 'index.php';
    exit;
  }
  if(isset($_POST['delete_item'])){
    $myfile = "data.json";
    $arr_data = array();
    $id = $_POST['id'];

    $jsondata = file_get_contents($myfile);
    $arr_data = json_decode($jsondata, true);

    $i = 0;
    $arr_index = array();
    foreach ($arr_data as $item) {
      if($item[id] == $id) {
        unset($arr_data[$i]);
      }
      $i++;
    }
    $arr_data = array_values($arr_data);

    $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

    if(file_put_contents($myfile, $jsondata)) {
      require 'index.php';
      exit;
    } else {
      echo "error";
    }
  }
