<?php

$instancia_id = $argv[1];
$lista = $argv[2];


sleep(10);  // Simulando um processamento demorado


$sql = "UPDATE lista_processamento SET status = 'Processado' WHERE instancia_id = '$instancia_id'";

echo "Processamento concluído para instância ID: $instancia_id";
echo "Lista:\n$lista\n";
?>
