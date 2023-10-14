<?php
// Conexão com o banco de dados (substitua pelas suas credenciais)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "instancia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Recebe o ID de instância da requisição GET
$instancia_id = $_GET['instancia_id'];

// Consulta o banco de dados para obter os dados processados
$sql = "SELECT * FROM dados_processados WHERE instancia_id='$instancia_id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row); // Retorna os dados processados
} else {
    echo "Nenhum dado processado encontrado para o ID de instância fornecido.";
}

$conn->close();
?>
