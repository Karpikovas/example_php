<?php

$myFile = __DIR__ . "/../db/data.json";


function getArray()
{
  global $myFile;
  $jsondata = file_get_contents($myFile);
  $arr_data = json_decode($jsondata, true);
  return $arr_data;
}

;

function saveArray($arr_data)
{
  global $myFile;
  $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
  file_put_contents($myFile, $jsondata);
}

;

function deleteItem($itemID)
{
  $arr_data = getArray();
  $i = 0;
  foreach ($arr_data as $item) {
    if ($item[id] == $itemID) {
      unset($arr_data[$i]);
    }
    $i++;
  }
  $arr_data = array_values($arr_data);
  saveArray($arr_data);
}

;

function addItem($item)
{
  $arr_data = getArray();
  $arr_data[] = $item;
  saveArray($arr_data);
}