<?php
class Venda
{
    private $mysql;

    public function __construct(mysqli $conexao)
    {
        $this->mysql = $conexao;
    }

    public function exibirTodosVendas(): array
    {
        $resultado = $this->mysql->query("SELECT * FROM venda");
        $vendas = $resultado->fetch_all(MYSQLI_ASSOC);
        return $vendas;
    }

    public function encontrarPorId(string $id)
    {
        $selecinaVenda = $this->mysql
            ->prepare("SELECT * FROM venda WHERE codigo=?");
        $selecinaVenda->bind_param('s', $id);

        $selecinaVenda->execute();

        $venda = $selecinaVenda
            ->get_result()
            ->fetch_assoc();

        return $venda;
    }

    public function encontrarPorCliente(string $id)
    {
        $selecinaVenda = $this->mysql
            ->prepare("SELECT * FROM vendas WHERE codigoCliente=?");
        $selecinaVenda->bind_param('s', $id);

        $selecinaVenda->execute();

        $venda = $selecinaVenda
            ->get_result();

        return $venda;
    }

    public function adicionarVenda(
        $venda
    ) {
        $adicionar = $this->mysql
            ->prepare("INSERT INTO 
        venda (PrimeiroNome,SegundoNome,Endereco,Cidade,CEP,RG,DataNasci,Fone)
        VALUES (?,?,?,?,?,?,?,?)");

        $adicionar->bind_param('sssssssss', $PrimeiroNome, $SegundoNome, $Endereco, $Cidade, $CPF, $CEP, $RG, $DataNasci, $Fone);

        $adicionar->execute();
    }

    public function editaVenda(
        $venda
    ) {
        $adicionar = $this->mysql
            ->prepare("UPDATE 
        venda SET PrimeiroNome = ? , SegundoNome = ? , Endereco = ? , Cidade = ? , CPF = ?, CEP = ? , RG = ? , DataNasci = ? , Fone = ?
        WHERE Codigo = ?");

        $adicionar->bind_param('ssssssssss', $venda['PrimeiroNome'], $SegundoNome, $Endereco, $Cidade, $CPF, $CEP, $RG, $DataNasci, $Fone, $Codigo);

        $adicionar->execute();
    }

    public function converterData(string $data, string $tipo):string{
        $array = explode($tipo, $data);
        $data = ($tipo === "-") ? ($array[0]."-".$array[1]."-".$array[2]) : ($array[2]."-".$array[1]."-".$array[0]);
        return $data;
    }

    public function excluirVenda(string $id): void
    {
        $excluir = $this->mysql->prepare("DELETE FROM 
                    Venda WHERE Codigo=?");
        $excluir->bind_param('s', $id);
        $excluir->execute();
    }
}

?>
