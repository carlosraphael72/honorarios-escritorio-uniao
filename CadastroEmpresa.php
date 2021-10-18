<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empresa</title>
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

    <h1 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">Cadastro de Empresa</h1>
    <?php 
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>

    <div class="container">
        <form method="POST" action="php/processa.php">
            <div class="row">
                <div class="col-25">
                    <label for="nome-empresa">Nome da Empresa</label>
                </div>
                <div class="col-75">
                    <input type="text" id="nome-empresa" name="empresa" placeholder="Nome da Empresa" size="50" required>
                    <span class="error"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="cnpj">CNPJ</label>
                </div>
                <div class="col-75">
                    <input type="text" name="cnpj"  placeholder="CNPJ" autocomplete="off" data-js="cnpj" required>
                    <span class="error"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="email">Email</label>
                </div>
                <div class="col-75">
                    <input type="email" id="email" name="email" placeholder="Email" size="30">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="telefone">Telefone</label>
                </div>
                <div class="col-75">
                    <input type="text" id="telefone" name="telefone" placeholder="Telefone" data-js="phone">
                </div>
            </div>
                <div class="form-inline">
                    <label for="cep" >CEP</label>
                    <input type="text" id="cep" name="cep" placeholder="CEP" size="10" data-js="cep" required>
                    <span class="error"></span>
                    <label for="Rua">Rua</label>
                    <input type="text" id="rua" name="rua" placeholder="Rua" size="40" required>
                    <span class="error"></span>
                    
                </div>
                <div class="form-inline">
                    <label for="numero">Número</label>
                    <input type="text" id="numero" name="numero" placeholder="Número" size="10" onkeypress="return somenteNumeros(event)" required>
                    <span class="error"></span>
                    <label for="complemento">Complemento</label>
                    <input type="text" id="complemento" name="complemento" placeholder="Complemento" size="27">
                </div>
                <div class="form-inline">
                    
                    <label for="bairro">Bairro</label>
                    <input type="text" id="bairro" name="bairro" placeholder="Bairro" required>
                    <span class="error"></span>
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" placeholder="Cidade" size="25" required>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="honorario">Valor do Honorário</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="honorario" name="honorario" placeholder="Honorário" size="10" data-js="valor" onkeypress="return somenteNumeros(event)" required>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="enviar" value="Enviar">
                </div>
        </form>
    </div>

    <footer>
        <script src="js/script.js"></script>
    </footer>

</body>
</html>