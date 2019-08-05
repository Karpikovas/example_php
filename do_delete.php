<?php

require 'lib/libjson.php';

if (isset($_POST['delete_item'])) {
  $id = $_POST['id'];
  deleteItem($id);
}

header("Location: index.php");
