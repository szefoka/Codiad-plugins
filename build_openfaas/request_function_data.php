<?php
// outputs the username that owns the running php/httpd process
// (on a system with the "whoami" executable in the path)
exec('ls /bitnami/codiad/workspace/'.$_GET['project'].'|grep y*ml', $outputArray);
echo "\n";
foreach ($outputArray as $item) {
    echo $item . "\n";
}
?>

