<?php
require 'config.php';
include 'src/Clientes.php';
require 'src/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id'];
    $cliente = new Cliente($mysql);
    $cliente->excluirCliente($id_cliente);
    redireciona('tabela-clientes.php');
} else {
    $id_cliente = $_GET['codigo'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Excluir Cliente</title>
</head>

<body class="bg-secondary">
    <div id="container">
        <h1>Você realmente deseja excluir o cliente?</h1>
        
        <form method="post" action="excluir-clientes.php">
            <p>
                <input type="hidden" name="id" value="<?= $id_cliente; ?>" />
                <button class="btn btn-dark">Excluir</button>
                <a href="index.php" class="ms-1 btn btn-secondary">Voltar</a>
            </p>
        </form>
    </div>
</body>

</html>