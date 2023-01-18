<?php

require_once('conexao.php');

    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        $prod = $_POST['prod'];
        $vend = $_POST['vend'];
        $qnt = $_POST['qnt'];
        $loja_Ref = $_POST['loja_ref'];
        $preco = $_POST['preco'];
        $cat = $_POST['cat'];
        $foto = $_FILES['file']['name'];
        $ref = ceil(rand()*5);

        $ver = "SELECT * FROM produtos WHERE loja_ref = '$loja_Ref' AND produto ='$prod' AND preco ='$preco' AND quem = 'Admin'";
        $con_v = $conexao->query($ver);
        $linh = mysqli_num_rows($con_v);

        if ($linh <= 0) {
            

            
        $sql = "INSERT INTO produtos (ref, produto, unidade, preco, foto_prod, quem, loja_ref, categoria) VALUES ('$ref', '$prod', '$qnt', '$preco', '$foto', 'admin', '$loja_Ref', '$cat')";
        $conn = $conexao->query($sql);
        move_uploaded_file($_FILES['file']['tmp_name'], '../produtos_lojas/' . $_FILES['file']['name']);
        echo json_encode("$prod foi adicionado com sucesso para sua loja!");


        }


        else{
            echo json_encode('Caro vendedor, ja existe um produto em seu Stock com os mesmos dados, edite-o apenas!');
        }
    }

?>