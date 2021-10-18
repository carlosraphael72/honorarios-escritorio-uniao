<?php 
session_start();
include_once("conexao.php");

$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_POST, 'valor', FILTER_DEFAULT);

$valor_ponto = str_replace(",", ".", $valor);

$valor_numero = floatval($valor_ponto);

if(isset($_POST['enviar'])){
    try{
        $sqlInsert = "INSERT INTO padroes (descricao, valor)
        VALUES ('$descricao', '$valor_numero')";
        $db->exec($sqlInsert);

        $_SESSION['msg'] = "<span style='color:green; text-align:center;'>Padrão de contas cadastrada com sucesso</span>";
        header("Location: ../PadroesdeTexto.php");
    }catch(PDOException $ex){
        $_SESSION['msg'] = "<span style='color:red; text-align:center;'>Erro no cadastro: </span>".$ex->getMessage();
        header("Location: ../PadroesdeTexto.php");
    }
}

?>