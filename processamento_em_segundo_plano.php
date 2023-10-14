<?php
// Recebe o ID de instância como argumento
$instancia_id = $argv[1];
$lista = $argv[2];

// Simulação de processamento em segundo plano
// Aqui você colocaria sua lógica real de processamento
sleep(10);  // Simulando um processamento demorado

// Exemplo: Atualiza o status de processamento na tabela lista_processamento
// Pode ser substituído por lógica de processamento real
$sql = "UPDATE lista_processamento SET status = 'Processado' WHERE instancia_id = '$instancia_id'";
// Execute a consulta no banco de dados

echo "Processamento concluído para instância ID: $instancia_id";
echo "Lista:\n$lista\n";
?>
