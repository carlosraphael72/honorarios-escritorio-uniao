<?php 
    include_once("php/conexao.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Contas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="navbar">
        <a href="index.html">Home</a>
        <div class="dropdown">
            <button class="dropbtn">Cadastros
                <i></i>
            </button>
            <div class="dropdown-content">
                <a href="CadastroEmpresa.php">Empresas</a>
                <a href="CadastroContas.php">Contas</a>
                <a href="PadroesdeTexto.html">Padrões de Texto</a>
            </div>
        </div>
    </div>

    <h1 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">Cadastro de Contas</h1>

    <div class="container">
        <form action="action_page.php">
            <div class="row">
                <div class="col-25">
                    <label for="nome-conta">Nome da Conta</label>
                </div>
                <div class="col-75">
                    <input type="text" id="nome-conta" name="conta" placeholder="Nome da Conta" size="50" required>
                </div>
            </div>
            <div class="row">
                    <div class="col-25">
                        <label for="empresa">Empresa</label>
                    </div>
                    <div class="col-75">
                        <select name="empresa" id="empresa">
                            <?php
                                $stmt = $db->prepare("SELECT * FROM empresas ORDER BY nome ASC");
                                $stmt->execute();

                                if($stmt->rowCount() > 0){
                                    while($dados = $stmt->fetch(PDO::FETCH_ASSOC)){
                                        echo "<option value='{$dados['slug']}'>{$dados['nome']}</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="honorario">Valor do Honorário</label>
                </div>
                <div class="col-75">
                    <input type="text" id="honorario" name="honorario" size="10" onkeypress="return somenteNumeros(event)">
                </div>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>