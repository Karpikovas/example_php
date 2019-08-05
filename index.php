<?php
include 'libhtml.php';
include 'libjson.php';

$content = "
  <form action=\"index.php\" method=\"post\">
    <input type='submit' name='submit' value='ADD NEW' />
  </form>

";
$content .= createTable(getArray(), true);
mainTemplate("MAIN", $content);
if(isset($_POST['submit'])){
  header ("Location: create.php");
}
?>
