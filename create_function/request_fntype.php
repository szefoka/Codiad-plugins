<?php
// outputs the username that owns the running php/httpd process
// (on a system with the "whoami" executable in the path)
exec("faas-cli template store list | grep openfaas | awk '{print $1}'", $outputArray);
echo "\n";
foreach ($outputArray as $item) {
    echo $item . "\n";
}
?>

