<?php
require 'config.php';
include 'src/Vendas.php';
require 'src/redireciona.php';

$vendas = new Venda($mysql);
$venda['Codigo'] = 0;
$venda['ValorParcial'] = '';
$venda['ValorDesconto'] = '';
$venda['ValorAcrescimo'] = '';
$opcao = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $vendas['Codigo'] = $_POST['Codigo'];
  $vendas['ValorParcial'] = $_POST['ValorParcial'];
  $vendas['ValorDesconto'] = $_POST['ValorDesconto'];
  $vendas['ValorAcrescimo'] = $_POST['ValorAcrescimo'];
  $vendas['CodigoCliente'] = $_POST['CodigoCliente'];

  if ($Codigo !== "0") {
    $vendas->editaVenda($vendas);
  } else {
    $vendas->adicionarVenda($vendas);
  }
  $texto = "form-clientes.php?opcao=view&codigo=".$venda['CodigoCliente'];
  redireciona($texto);
}
if (isset($_GET['venda'])) {
  $venda = $vendas->encontrarPorId($_GET['venda']);
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
            <a class="nav-link active" href="tabela-vendas.php">Clientes</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main class="container">
    <h1 class="text-center mt-2">Formulário Clientes</h1>
    <form method="POST" action="vendas.php">
      <div class="row mb-1">
        <div class="col-12 col-md-4 mb-2">
          <label for="ValorParcial" class="form-label mb-0">Valor Parcial</label>
          <input type="number" class="form-control" name="ValorParcial" id="ValorParcial" value="<?= $venda['ValorParcial']; ?>" required <?= ($opcao ==="view") ? "disabled" : ""?>/>
          <input class="form-control" type="hidden" id="Codigo" name="Codigo" value="<?= $venda['Codigo']; ?>" />
        </div>
        <div class="col-12 col-md-4 mb-2">
          <label for="segundoNome" class="form-label mb-0">Valor Desconto</label>
          <input type="number" class="form-control" name="ValorDesconto" id="ValorDesconto" value="<?= $venda['ValorDesconto']; ?>" required <?= ($opcao ==="view") ? "disabled" : ""?>/>
        </div>
        <div class="col-12 col-md-4 mb-2">
          <label for="ValorAcrescimo" class="form-label mb-0">Valor Acréscimo</label>
          <input type="number" class="form-control" name="ValorAcrescimo" id="ValorAcrescimo" value="<?= $venda['ValorAcrescimo']; ?>" required <?= ($opcao ==="view") ? "disabled" : ""?>/>
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
          <a href="vendas.php?venda=<?=$_GET['codigo'];?>" class="btn btn-dark">
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
              <th scope="col">Opções</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>@mdo</td>
              <td scope="row">
                <a class="text-success text-decoration-none" href="#">
                  <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <a class="text-danger text-decoration-none" href="#">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>Thornton</td>
              <td>@fat</td>
              <td scope="row">
                <a class="text-success text-decoration-none" href="#">
                  <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <a class="text-danger text-decoration-none" href="#">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry the Bird</td>
              <td>Larry the Bird</td>
              <td>Thornton</td>
              <td>@twitter</td>
              <td scope="row">
                <a class="text-success text-decoration-none" href="#">
                  <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <a class="text-danger text-decoration-none" href="#">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>