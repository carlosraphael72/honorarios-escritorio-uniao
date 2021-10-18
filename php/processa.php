<?php
    session_start();
    include_once("conexao.php");

    $nome_empresa = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
    $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
    $rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
    $complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $honorario = filter_input(INPUT_POST, 'honorario', FILTER_DEFAULT);

    $valor_ponto = str_replace(",", ".", $honorario);

    $valor_numero = floatval($valor_ponto);

/*
    echo "Nome da empresa: $nome_empresa <br>";
    echo "CNPJ: $cnpj <br>";
    echo "Email: $email <br>";
    echo "Telefone: $telefone <br>";
    echo "CEP: $cep <br>";
    echo "Rua: $rua <br>";
    echo "Número: $numero <br>";
    echo "Complemento: $complemento <br>";
    echo "Bairro: $bairro <br>";
    echo "Cidade: $cidade <br>";
    echo "Honorário: $honorario <br>";
*/

    if(isset($_POST['enviar'])){
        try{
            $sqlInsert = "INSERT INTO empresas (nome, cnpj, email, telefone, cep, rua, numero, complemento, bairro, cidade, honorarios)
             VALUES ('$nome_empresa', '$cnpj', '$email', '$telefone', '$cep', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$valor_numero')";
            $db->exec($sqlInsert);

            $_SESSION['msg'] = "<span style='color:green; text-align: center;'>Empresa cadastrada com sucesso</span>";
            header("Location: ../CadastroEmpresa.php");
        }catch(PDOException $ex){
            $_SESSION['msg'] = "<span style='color:red; text-align: center;'>Erro no cadastro: </span>".$ex->getMessage();
            header("Location: ../CadastroEmpresa.php");
        }
    }

   /* $sql_empresa = "INSERT INTO empresas (nome, cnpj, email, telefone, cep, rua, numero, complemento, bairro, cidade, honorarios) VALUES ('$nome_empresa', '$cnpj', '$email', '$telefone', '$cep', '$rua', '$numero', '$complemento', '$bairro', '$bairro', '$cidade', '$honorario')";
    $sql_query = mysqli_query($conn, $sql_empresa);

    if(mysqli_insert_id($conn)){
        $_SESSION['msg'] = "<span style='color:green; text-align: center;'>Empresa cadastrada com sucesso</span>";
        header("Location: ../CadastroEmpresa.php");
    } else {
        $_SESSION['msg'] = "<span style='color:red; text-align: center;'>Erro no cadastro</span>";
        header("Location: ../CadastroEmpresa.php");
    }*/
?>