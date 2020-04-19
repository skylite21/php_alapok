<?php

// https://medium.com/helium-mvc/when-to-use-static-classes-and-methods-84108f4801ea
class FileManagerInstance {

  public function copyFile($current_file, $new_file) {
    $result = FALSE;
    if (file_exists($current_file)) {
      $result = copy($current_file, $new_file);
    }
    return $result;
  }

}

class FileManagerStatic {

  public static function copyFile($current_file, $new_file) {
    $result = FALSE;
    if (file_exists($current_file)) {
      $result = copy($current_file, $new_file);
    }
    return $result;
  }

}

$start = microtime(TRUE);

for ($i = 0; $i < 1000000; $i++) {
  $file_manger = new FileManagerInstance();
  $file_manger->copyFile('copy_file.php', 'output/testa_' . $i);
}

$instance_time = (microtime(TRUE) - $start);

echo 'instance used ' . $instance_time . ' s';

$start = microtime(TRUE);

for ($i = 0; $i < 1000000; $i++) {
  FileManagerStatic::copyFile('copy_file.php', 'output/testb_' . $i);
}

$static_time = (microtime(TRUE) - $start);

echo "\n static used " . $static_time . ' s';

if ($static_time < $instance_time) {
  echo "Static was faster!";
}
elseif ($static_time > $instance_time) {
  echo "Instance was faster!";
}
elseif ($static_time == $instance_time) {
  echo "insane!!! equal";
}
