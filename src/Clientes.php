<?php
class Cliente
{
    private $mysql;

    public function __construct(mysqli $conexao)
    {
        $this->mysql = $conexao;
    }

    public function exibirTodosClientes(): array
    {
        $resultado = $this->mysql->query("SELECT * FROM cliente");
        $clientes = $resultado->fetch_all(MYSQLI_ASSOC);
        return $clientes;
    }

    public function encontrarPorId(string $id)
    {
        $selecinaCliente = $this->mysql
            ->prepare("SELECT * FROM cliente WHERE codigo=?");
        $selecinaCliente->bind_param('s', $id);

        $selecinaCliente->execute();

        $cliente = $selecinaCliente
            ->get_result()
            ->fetch_assoc();

        return $cliente;
    }

    public function adicionarCliente(
        string $PrimeiroNome, $SegundoNome, $Endereco, $Cidade, $CEP, $RG, $DataNasci, $Fone
    ) {
        $adicionar = $this->mysql
            ->prepare("INSERT INTO 
        cliente (PrimeiroNome,SegundoNome,Endereco,Cidade,CEP,RG,DataNasci,Fone)
        VALUES (?,?,?,?,?,?,?,?)");

        $adicionar->bind_param('sssssssss', $PrimeiroNome, $SegundoNome, $Endereco, $Cidade, $CPF, $CEP, $RG, $DataNasci, $Fone);

        $adicionar->execute();
    }

    public function editaCliente(
        String $Codigo, $PrimeiroNome, $SegundoNome, $Endereco, $Cidade, $CPF, $CEP, $RG, $DataNasci, $Fone
    ) {
        $adicionar = $this->mysql
            ->prepare("UPDATE 
        cliente SET PrimeiroNome = ? , SegundoNome = ? , Endereco = ? , Cidade = ? , CPF = ?, CEP = ? , RG = ? , DataNasci = ? , Fone = ?
        WHERE Codigo = ?");

        $adicionar->bind_param('ssssssssss', $PrimeiroNome, $SegundoNome, $Endereco, $Cidade, $CPF, $CEP, $RG, $DataNasci, $Fone, $Codigo);

        $adicionar->execute();
    }

    public function converterData(string $data, string $tipo):string{
        $array = explode($tipo, $data);
        $data = ($tipo === "-") ? ($array[0]."-".$array[1]."-".$array[2]) : ($array[2]."-".$array[1]."-".$array[0]);
        return $data;
    }

    public function excluirCliente(string $id): void
    {
        $excluir = $this->mysql->prepare("DELETE FROM 
                    Cliente WHERE Codigo=?");
        $excluir->bind_param('s', $id);
        $excluir->execute();
    }
}

?>
