<?php

require 'autoloader.php';
$libJSON = new libJSON();

if (isset($_POST['delete'])) {
  $id = $_POST['id'];
  $libJSON->deleteItem($id);
}

header("Location: /");
