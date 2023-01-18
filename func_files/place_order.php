<?php
        require_once('conexao.php');

        $ref = $_POST['reff'];
        $prod = $_POST['prod'];
        $preco = $_POST['preco'];
        $ip = $_POST['code_buy'];
       
            
        $sql = "INSERT INTO carrinho (produto, ref, preco, en_ip, obs, placed, given) VALUES ('Carrinho', '$ref', '$preco', '$ip', 'Compra Carrinho', 'no', 'no')";
        $conn = $conexao->query($sql);
       
        echo json_encode("$prod foi adicionado com sucesso ao seu carrinho!");
?>