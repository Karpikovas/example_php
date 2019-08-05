<?php
include 'libjson.php';
  if(isset($_POST['cancel'])){
    header ("Location: index.php");
  }
  if(isset($_POST['delete_item'])){
    $id = $_POST['id'];
    deleteItem($id);
    header ("Location: index.php");
  }
