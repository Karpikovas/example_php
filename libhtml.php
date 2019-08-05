<?php
  function mainTemplate($title, $content) {
    $template = "
    <html>
      <head>
        <title>$title</title>
      </head>
      <body>
        $content
      </body>
    </html>
    ";
    echo $template;
  }
  function createTable($data, $formEnable) {
    $table_items ="";
    foreach ($data as $result) {
      $table_items .= "    
      <tr> 
        <td>$result[id]</td>
        <td>$result[name]</td>
        <td>$result[secondname]</td>
        <td>$result[patr]</td>
        <td>$result[birthday]</td>
       ";
      if ($formEnable) {
        $table_items .= "
        <td>
          <form action='delete.php' method='post'>
            <input type='submit' name='delete' value='DELETE'/>
            <input type='hidden' name='id' value=$result[id] />
          </form>
          </td> 
          ";
      }
      $table_items .= "</tr>";
    }
    $main_table = "
    <table border=\"1\">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Secondname</th>
        <th>Patr</th>
        <th>Birthday</th>
        <th>Delete</th>
      </tr>
        $table_items
    </table>
    ";
    return $main_table;
  }