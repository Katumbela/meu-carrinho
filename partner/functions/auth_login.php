<?php

include("conexao.php");

$senha = $_POST["senha"];
$telefone = $_POST["tel"];
$token = $_POST["token"];

$ver = "SELECT * FROM lojas WHERE  codigo = '$telefone' AND senha ='$senha'";
$con_v = $conexao->query($ver);
$linh = mysqli_num_rows($con_v);

    if ($linh >= 1) {
        session_start();
        $dados = mysqli_fetch_array($con_v);
        $_SESSION['codigo'] = $dados['codigo'];
        
        header("location: ../dashboard.php");
    }

else{
    var_dump($_POST);
}

?>