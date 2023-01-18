<?php

include("conexao.php");


    
$sql = "INSERT INTO `usuarios_carrinho` ( `nome`, `endereco`, `telefone`, `email`, `senha`, `codigo`, `promo`, `quando`, `obs`) VALUES ( '$nome', '$end', '$tel', '$email', '$senha', '$code', '000000', 'Usuario normal')";
$conn = $conexao->query($sql);

echo json_encode("$prod foi adicionado com sucesso para sua loja!");






?>