<?php

echo '<div>' . htmlspecialchars($_GET['name']) . '</div>';
// http://127.0.0.1:5500/get-test.php?name=%22%3Cscript%3Ealert(%22TEST%22);%3C/script%3E%22
echo '<div>' . $_GET['name'] . '</div>';
?>

<form action="/get-test.php" method="get" >
  <input type="text" name="name">
  <select id="type" name="type">
    <option value="professional">Professional</option>
    <option value="basic">Basic</option>
  </select>
  <button type="submit" name="subscribe" >subscribe</button>
</form>
<?php var_dump($_GET); ?>
