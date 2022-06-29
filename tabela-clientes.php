<?php
require 'config.php';
include 'src/Clientes.php';
$meusClientes = new Cliente($mysql);
$clientes = $meusClientes->exibirTodosClientes();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Prova de SGBD</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Prova SGBD</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="tabela-clientes.php"
                >Clientes</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <main class="container">
      <h1 class="text-center mt-2">Tabela de Clientes</h1>
      <div class="d-flex flex-row-reverse mb-2">
        <a href="form-clientes.php" class="btn btn-dark">
          <i class="fa-solid fa-user-plus"></i> Cadastrar
        </a>
      </div>
      <table class="table table-striped">
        <thead class="bg-dark text-light">
          <tr>
            <th scope="col-1">#</th>
            <th scope="col-4">Primeiro Nome</th>
            <th scope="col-4">Segundo Nome</th>
            <th scope="col-2">Telefone</th>
            <th scope="col-1">Opções</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($clientes as $cliente) : ?>
          <tr>
            <th scope="row"><?php echo $cliente['Codigo']; ?></th>
            <td><?php echo $cliente['PrimeiroNome']; ?></td>
            <td><?php echo $cliente['SegundoNome']; ?></td>
            <td><?php echo $cliente['Fone']; ?></td>
            <td>
              <a class="text-primary text-decoration-none" href="form-clientes.php?opcao=view&codigo=<?php echo $cliente['Codigo']; ?>">
                <i class="fa-solid fa-eye"></i>
              </a>
              <a class="text-success text-decoration-none" href="form-clientes.php?opcao=edit&codigo=<?php echo $cliente['Codigo']; ?>">
                <i class="fa-solid fa-pen-to-square"></i>
              </a>
              <a class="text-danger text-decoration-none" href="excluir-clientes.php?codigo=<?php echo $cliente['Codigo']; ?>">
                <i class="fa-solid fa-trash"></i>
              </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </main>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
