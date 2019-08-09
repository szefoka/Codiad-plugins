<?php
// outputs the username that owns the running php/httpd process
// (on a system with the "whoami" executable in the path)
exec('faas-cli build -f /bitnami/codiad/workspace'.$_GET['projname'].'/'.$_GET['fname'] --remotedocker $_ENV['DOCKER_SERVER']);
exec('faas-cli push -f /bitnami/codiad/workspace'.$_GET['projname'].'/'.$_GET['fname'] --remotedocker $_ENV['DOCKER_SERVER']);
exec('faas-cli deploy -f /bitnami/codiad/workspace'.$_GET['projname'].'/'.$_GET['fname'] -g $_ENV['OFAAS_GW']);
echo "Function " . $_GET['projname'] . "/" . $_GET['fname'] . " had been successfully built";
?>

