
<?php

session_start();
include("conexao.php");

$user = $_POST['user'];


$q = "UPDATE `carrinho` SET `placed` = 'yes' WHERE `carrinho`.`en_ip` ='$user'";
$mysq = $conexao->query($q);

if($mysq){
    echo "Entregue!";
}


?>