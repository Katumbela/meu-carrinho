<?php

include("conexao.php");

$d_tel = base64_decode("Telefone");
$d_senha = base64_decode("Senha");
$senha = $_POST["senha"];
$telefone = $_POST["tel"];

$ver = "SELECT * FROM usuarios_carrinho WHERE  telefone = '$telefone' AND senha ='$senha'";
$con_v = $conexao->query($ver);
$linh = mysqli_num_rows($con_v);

if ($linh >= 1) {

    session_start();

    $dados = mysqli_fetch_array($con_v);

    $_SESSION['id'] = $dados['id'];
    $_SESSION['nome'] = $dados['nome'];
    $_SESSION['email'] = $dados['email'];
    $_SESSION['tel'] = $dados['telefone'];
    $_SESSION['codigo'] = $dados['codigo'];
    $_SESSION['endereco'] = $dados['endereco'];
    $_SESSION['quando'] = $dados['quando'];
    
    header("location: ../home/");

}


else{
    $erro = base64_encode("erro");
header("location: ../login.php?query={$erro}");
}



?>