<?php var_dump($_POST) ?>
<form action="/post-test.php" method="post" >
  <input type="text" name="name">
  <select id="type" name="type[]" multiple>
    <option value="professional">Professional</option>
    <option value="basic">Basic</option>
    </select>
    <input type="checkbox" name="package_no[]", value="1 package">
    <input type="checkbox" name="package_no[]", value="2 package">
    <input type="checkbox" name="package_no[]", value="3 package">
  <button type="submit" name="subscribe" >subscribe</button>
</form>
