<?php
function calcularTotal($lista) {
    $resultados = [];

    foreach ($lista as $item) {
        // Extrai os dados do item da lista
        $id = $item[1];
        $quantidade = (float) str_replace(',', '.', $item[4]);
        $precoUnitario = (float) str_replace(',', '.', $item[6]);

        // Calcula o total para o item
        $totalItem = $quantidade * $precoUnitario;

        // Armazena o resultado na estrutura de dados
        $resultados[] = [
            'id' => $id,
            'total' => $totalItem
        ];
    }

    return $resultados;
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "instancia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$lista = $_GET['lista'];

$instancia_id = uniqid();

$sql = "INSERT INTO lista_processamento (instancia_id, lista)
        VALUES ('$instancia_id', '$lista')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['instancia_id' => $instancia_id]);
    exec("C:\\xampp\\php\\php.exe processamento_em_segundo_plano.php $instancia_id \"$lista\" > NUL 2>&1");

} else {
    echo "Erro ao inserir os dados no banco de dados: " . $conn->error;
}

$conn->close();
?>
