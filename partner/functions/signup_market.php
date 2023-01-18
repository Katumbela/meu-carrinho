<?php
include("conexao.php");


$sql = "INSERT INTO `lojas` (`id`, `foto_loja`, `banner_loja`, `loja`, `endereco`, `codigo`, `dono`, `email`, `telefone`, `pub`, `quando`, `obs`, `outro`) VALUES ('1', 'loja_1.jpg', 'default.png', 'Loja Katumbela 2K', 'KK 500 - Q4', '13579', 'Joao Afonso Katombela', 'katumbela@meucarrinho.com', '123456789', 'None', current_timestamp(), 'Parceiro', '...')";
$s= $conexao->query($sql);



?>