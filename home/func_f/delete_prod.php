<?php


session_start();
include("../../func_files/conexao.php");

$id = $_POST['typeID'];


$qq = "UPDATE `carrinho` SET `given` = 'deleted' WHERE `carrinho`.`id` ='$id'";
$q = "UPDATE `carrinho` SET `placed` = 'deleted' WHERE `carrinho`.`id` ='$id'";
$mysq = $conexao->query($q);
$mysq = $conexao->query($qq);

if($mysq){
    echo "eliminado ";
}


?>