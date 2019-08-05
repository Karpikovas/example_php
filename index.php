<html>
  <head>
    <title>ADD</title>
  </head>
  <body>
  <form action="index.php" method="post">
    <input type='submit' name='submit' value='ADD NEW' />
  </form>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Secondname</th>
      <th>Patr</th>
      <th>Birthday</th>
      <th>Delete</th>
    </tr>

<?php

$myfile = "data.json";
$arr_data = array();

$jsondata = file_get_contents($myfile);
$arr_data = json_decode($jsondata, true);

if (count($arr_data) !== 0) {
  foreach ($arr_data as $result) {
    $template = "    
      <tr> 
        <td>$result[id]</td>
        <td>$result[name]</td>
        <td>$result[secondname]</td>
        <td>$result[patr]</td>
        <td>$result[birthday]</td>
        <td>
           <form action='delete.php' method='post'>
                <input type='submit' name='delete' value='DELETE'/>
                <input type='hidden' name='id' value=$result[id] />
              </form> 
        </td>
       ";
    echo $template;
  }
}

if(isset($_POST['submit'])){
  ob_clean();
  require 'create.php';
  exit;
}
?>
</table>
</body>
</html>
