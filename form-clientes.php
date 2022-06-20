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
      <h1 class="text-center mt-2">Formulário Clientes</h1>
      <form action="">
        <div class="row mb-1">
          <div class="col-12 col-md-4 mb-2">
            <label for="primeiroNome" class="form-label mb-0"
              >Primeiro nome</label
            >
            <input type="text" class="form-control" id="primeiroNome" />
          </div>
          <div class="col-12 col-md-4 mb-2">
            <label for="segundoNome" class="form-label mb-0"
              >Segundo nome</label
            >
            <input type="text" class="form-control" id="segundoNome" />
          </div>
          <div class="col-12 col-md-4 mb-2">
            <label for="endereco" class="form-label mb-0">Endereço</label>
            <input type="text" class="form-control" id="endereco" />
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12 col-md-2 mb-2">
            <label for="cidade" class="form-label mb-0">Cidade</label>
            <input type="text" class="form-control" id="cidade" />
          </div>
          <div class="col-12 col-md-2 mb-2">
            <label for="cep" class="form-label mb-0">CEP</label>
            <input type="text" class="form-control" id="cep" />
          </div>
          <div class="col-12 col-md-2 mb-2">
            <label for="cep" class="form-label mb-0">CPF</label>
            <input
              type="text"
              class="form-control"
              id="cep"
              placeholder="000.000.000-00"
            />
          </div>
          <div class="col-12 col-md-2 mb-2">
            <label for="rg" class="form-label mb-0">RG</label>
            <input type="text" class="form-control" id="rg" />
          </div>
          <div class="col-12 col-md-2 mb-2">
            <label for="dtNasc" class="form-label mb-0"
              >Data de nascimento</label
            >
            <input type="date" class="form-control" id="dtNasc" />
          </div>
          <div class="col-12 col-md-2 mb-2">
            <label for="telefone" class="form-label mb-0">Telefone</label>
            <input
              type="text"
              class="form-control"
              id="telefone"
              placeholder="(00) 00000-0000"
            />
          </div>
        </div>
        <div class="d-flex flex-row-reverse">
          <button type="submit" class="btn btn-dark ms-2">
            <i class="fa-solid fa-floppy-disk"></i> Cadastrar
          </button>
          <button type="submit" class="btn btn-secondary">Cancelar</button>
        </div>
      </form>
      <hr />
      <div class="mt-2">
        <h3 class="text-center">Vendas</h3>
        <!-- Button trigger modal -->
        <div class="d-flex flex-row-reverse">
          <button
            type="button"
            class="btn btn-dark"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
          >
            <i class="fa-solid fa-sack-dollar"></i> Nova Venda
          </button>
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

      <!-- Modal -->
      <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nova Venda</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="mb-1">
                <label for="valorParcial" class="form-label mb-0">
                  Valor Parcial
                </label>
                <input type="number" class="form-control" id="valorParcial" />
              </div>
              <div class="mb-1">
                <label for="valorDesconto" class="form-label mb-0">
                  Valor Desconto
                </label>
                <input type="number" class="form-control" id="valorDesconto" />
              </div>
              <div class="mb-0">
                <label for="valorAcrescimo" class="form-label mb-0">
                  Valor Acréscimo
                </label>
                <input type="number" class="form-control" id="valorAcrescimo" />
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Cancelar
              </button>
              <button type="button" class="btn btn-dark">Cadastrar</button>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
