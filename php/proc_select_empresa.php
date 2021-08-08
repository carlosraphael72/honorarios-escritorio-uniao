<?php

include_once("php/conexao.php");

$nome_empresa = filter_input(INPUT_GET, 'empresa', FILTER_SANITIZE_STRING);
if(!empty($empresa)){
    $limit = 1;
    $select_sempresas = "SELECT * FROM empresas WHERE nome =:nome LIMIT :limit";

    $resultado_empresa = $conn->prepare($select_sempresas);
    $resultado_empresa->bindParam(':nome', $nome_empresa, PDO::PARAM_STR);
    $resultado_empresa->bindParam(':limit', $limit, PDO::PARAM_INT);
    $resultado_empresa->execute();

    $array_valores = array();

    if($resultado_empresa->rowCount() != 0){
        $row_empresas = $resultado_empresa->fetch(PDO::FETCH_ASSOC);
        $array_valores['honorario'] = $row_empresas['honorarios'];
    } else {
        $array_valores['honorario'] = '0';
    }
    echo json_encode($array_valores);
}

?>