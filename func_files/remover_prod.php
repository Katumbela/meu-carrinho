<?php

       include('conexao.php');

       $id = $_POST['id'];
       $prod = $_POST['prod'];
        $sql = "DELETE FROM `carrinho` WHERE `carrinho`.`id` = '$id'";
        $conn = $conexao->query($sql);
       
        echo json_encode("$prod foi removido com sucesso ao seu carrinho!");
?>