<?php
// outputs the username that owns the running php/httpd process
// (on a system with the "whoami" executable in the path)
//exec("cd /bitnami/codiad/workspace/" . $_GET['projname'] . "/ &&  faas-cli new " . $_GET['fname'] . " --lang " . $_GET['ftype']);
exec("cd /bitnami/codiad/workspace/" . $_GET['projname'] . "&&" . "faas-cli new " . $_GET['fname'] . " --lang " . $_GET['ftype']);
echo $_GET['ftype'] .  "Function" . $_GET['fname'] . " in " . $_GET['projname'] . "skeleton created";
?>

