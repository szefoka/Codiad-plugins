<?php
// outputs the username that owns the running php/httpd process
// (on a system with the "whoami" executable in the path)
exec("ls -l /bitnami/codiad/workspace/ | egrep '^d' | awk '{print $9}'", $outputArray);
echo "\n";
foreach ($outputArray as $item) {
    echo $item . "\n";
}
?>

