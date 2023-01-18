<?php

session_start();
include("../../func_files/conexao.php");

$ref = $_POST['typeProd'];
$id = $_POST['typeID'];


$q = "UPDATE `carrinho` SET `given` = 'yes' WHERE `carrinho`.`id` ='$id' AND `carrinho`.`ref`='$ref'";
$mysq = $conexao->query($q);

if($mysq){
    echo "Entregue!";
}


?>