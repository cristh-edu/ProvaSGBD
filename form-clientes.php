<?php
require 'config.php';
include 'src/Clientes.php';
require 'src/redireciona.php';

$clientes = new Cliente($mysql);
$cliente['Codigo'] = 0;
$cliente['PrimeiroNome'] = '';
$cliente['SegundoNome'] = '';
$cliente['Endereco'] = '';
$cliente['Cidade'] = '';
$cliente['CEP'] = '';
$cliente['CPF'] = '';
$cliente['RG'] = '';
$cliente['DataNasci'] = '';
$cliente['Fone'] = '';
$opcao = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $Codigo = $_POST['Codigo'];
  $PrimeiroNome = $_POST['PrimeiroNome'];
  $SegundoNome = $_POST['SegundoNome'];
  $Endereco = $_POST['Endereco'];
  $Cidade = $_POST['Cidade'];
  $CEP = $_POST['CEP'];
  $CPF = $_POST['CPF'];
  $RG = $_POST['RG'];
  $DataNasci = $_POST['DataNasci'];
  $Fone = $_POST['Fone'];

  if ($Codigo !== "0") {
    $clientes->editaCliente($Codigo, $PrimeiroNome, $SegundoNome, $Endereco, $Cidade, $CPF, $CEP, $RG, $DataNasci, $Fone);
  } else {
    $clientes->adicionarCliente($PrimeiroNome, $SegundoNome, $Endereco, $Cidade, $CPF, $CEP, $RG, $DataNasci, $Fone);
  }
  redireciona('tabela-clientes.php');
}
if (isset($_GET['codigo'])) {
  $cliente = $clientes->encontrarPorId($_GET['codigo']);
  $opcao = $_GET['opcao'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Prova de SGBD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Prova SGBD</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="tabela-clientes.php">Clientes</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main class="container">
    <h1 class="text-center mt-2">Formulário Clientes</h1>
    <form method="POST" action="form-clientes.php">
      <div class="row mb-1">
        <div class="col-12 col-md-4 mb-2">
          <label for="PrimeiroNome" class="form-label mb-0">Primeiro nome</label>
          <input type="text" class="form-control" name="PrimeiroNome" id="PrimeiroNome" value="<?= $cliente['PrimeiroNome']; ?>" required <?= ($opcao ==="view") ? "disabled" : ""?>/>
          <input class="form-control" type="hidden" id="Codigo" name="Codigo" value="<?= $cliente['Codigo']; ?>" />
        </div>
        <div class="col-12 col-md-4 mb-2">
          <label for="segundoNome" class="form-label mb-0">Segundo nome</label>
          <input type="text" class="form-control" name="SegundoNome" id="SegundoNome" value="<?= $cliente['SegundoNome']; ?>" required <?= ($opcao ==="view") ? "disabled" : ""?>/>
        </div>
        <div class="col-12 col-md-4 mb-2">
          <label for="Endereco" class="form-label mb-0">Endereço</label>
          <input type="text" class="form-control" name="Endereco" id="Endereco" value="<?= $cliente['Endereco']; ?>" required <?= ($opcao ==="view") ? "disabled" : ""?>/>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-12 col-md-2 mb-2">
          <label for="Cidade" class="form-label mb-0">Cidade</label>
          <input type="text" class="form-control" name="Cidade" id="Cidade" value="<?= $cliente['Cidade']; ?>" required <?= ($opcao ==="view") ? "disabled" : ""?>/>
        </div>
        <div class="col-12 col-md-2 mb-2">
          <label for="CEP" class="form-label mb-0">CEP</label>
          <input type="text" class="form-control" name="CEP" id="CEP" value="<?= $cliente['CEP']; ?>" required <?= ($opcao ==="view") ? "disabled" : ""?>/>
        </div>
        <div class="col-12 col-md-2 mb-2">
          <label for="CPF" class="form-label mb-0">CPF</label>
          <input type="text" class="form-control" id="CPF" name="CPF" placeholder="000.000.000-00" value="<?= $cliente['CPF']; ?>" required <?= ($opcao ==="view") ? "disabled" : ""?>/>
        </div>
        <div class="col-12 col-md-2 mb-2">
          <label for="RG" class="form-label mb-0">RG</label>
          <input type="text" class="form-control" name="RG" id="RG" value="<?= $cliente['RG']; ?>" <?= ($opcao ==="view") ? "disabled" : ""?>/>
        </div>
        <div class="col-12 col-md-2 mb-2">
          <label for="DataNasci" class="form-label mb-0"> Data de nascimento </label>
          <input type="date" class="form-control" name="DataNasci" id="DataNasci" value="<?= $clientes->converterData($cliente['DataNasci'], "-") ?>" required <?= ($opcao ==="view") ? "disabled" : ""?>/>
        </div>
        <div class="col-12 col-md-2 mb-2">
          <label for="Fone" class="form-label mb-0">Telefone</label>
          <input type="text" class="form-control" id="Fone" name="Fone" placeholder="(00) 00000-0000" value="<?= $cliente['Fone']; ?>" required <?= ($opcao ==="view") ? "disabled" : ""?>/>
        </div>
      </div>
      <div class="d-flex flex-row-reverse">
        <button type="submit" class="btn btn-dark ms-2" <?= ($opcao ==="view") ? "disabled" : ""?>>
          <i class="fa-solid fa-floppy-disk"></i> Cadastrar
        </button>
        <input class="btn btn-secondary" type="reset" value="Limpar Formulário" <?= ($opcao ==="view") ? "disabled" : ""?>/>
      </div>
    </form>
    <?php if (isset($_GET['codigo'])) : ?>
      <hr />
      <div class="mt-2">
        <h3 class="text-center">Vendas</h3>
        <!-- Button trigger modal -->
        <div class="d-flex flex-row-reverse">
          <a href="vendas.php?cliente=<?=$_GET['codigo'];?>" class="btn btn-dark">
            <i class="fa-solid fa-sack-dollar"></i> Nova Venda
          </a>
        </div>
        <table class="mt-2 table table-striped">
          <thead class="bg-dark text-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Valor Parcial</th>
              <th scope="col">Valor Desconto</th>
              <th scope="col">Valor Acréscimo</th>
              <th scope="col">Valor Total</th>
              <th scope="col">Data da Venda</th>
              <th scope="col">Opções</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            include 'src/Vendas.php';
            $minhasVendas = new Venda($mysql);
            $vendas = $minhasVendas->encontrarPorCliente($_GET['codigo']);
            foreach ($vendas as $venda) :
          ?>
            <tr>
              <th scope="row"><?= $venda['Codigo'];?></th>
              <td><?= $venda['ValorParcial'];?></td>
              <td><?= $venda['ValorDesconto'];?></td>
              <td><?= $venda['ValorAcrescimo'];?></td>
              <td><?= $venda['ValorTotal'];?></td>
              <td><?= $venda['dtVenda'];?></td>
              <td scope="row">
                <a class="text-success text-decoration-none" href="#">
                  <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <a class="text-danger text-decoration-none" href="#">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>  
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>