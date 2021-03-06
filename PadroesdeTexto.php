<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padrões de Texto</title>
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

    <h1 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">Padrões de Contas</h1>

    <div class="container">
        <form method="POST" action="php/processa_padroes_contas.php">
            <div class="row">
                <div class="col-25">
                    <label for="descricao">Descrição</label>
                </div>
                <div class="col-75">
                    <input type="text" id="descricao" name="descricao" placeholder="Descrição" size="50" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="valor">Valor</label>
                </div>
                <div class="col-75">
                    <input type="text" id="valor" name="valor" size="10" placeholder="Valor do Honorário" data-js="valor" onkeypress="return somenteNumeros(event)" required>
                </div>
            </div>
            <div class="row">
                <input type="submit" name="enviar" value="Enviar">
            </div>
        </form>
    </div>

    <script src="js/script.js"></script>
</body>
</html>