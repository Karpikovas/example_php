<html>
<head>
  <title>DELETE</title>
</head>
<body>
<table border="1">
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Secondname</th>
  <th>Patr</th>
  <th>Birthday</th>
</tr>

<?php
if(isset($_POST['delete'])) {
  $myfile = "data.json";
  $arr_data = array();
  $jsondata = file_get_contents($myfile);
  $arr_data = json_decode($jsondata, true);
  $id = $_POST['id'];

  foreach ($arr_data as $result) {
    if ($_POST['id'] == $result['id']) {
      $template = "
        <tr>
          <td>$result[id]</td>
          <td>$result[name]</td>
          <td>$result[secondname]</td>
          <td>$result[patr]</td>
          <td>$result[birthday]</td>
        </tr>
    ";
      echo $template;
    }
  }
}
?>
</table>
<form action="do_delete.php" method="post">
  <input type="submit" value="DELETE" name="delete_item" />
  <input type="submit" value="CANCEL" name="cancel" />
  <input type='hidden' name='id' value=<?php echo $id;?> />
</form>
</body>
</html>