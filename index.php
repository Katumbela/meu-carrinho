
<?php
session_start();
include("./func_files/conexao.php");


$ip2 = $_SERVER['REMOTE_ADDR'];

if (!empty($_SESSION['id'])) {
    
    $nome = $_SESSION['nome'];
    $email = $_SESSION['email'];
    $tel = $_SESSION['tel'];
    $codigo = $_SESSION['codigo'];
    $end = $_SESSION['endereco'];
    $quando = $_SESSION['quando'];

    $p_nome = explode(" ", $nome);
    $primeiro_nome = $p_nome[0];
}

else{
    echo "";
    $codigo = "0000";
}

?>

<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="2000">
    <title>Meu Carrinho compras</title>
    <link rel="shortcut icon" href="img/logo.jpeg" type="image/x-icon">
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="owl/dist/owl.carousel.js"></script>
    <link rel="stylesheet" href="owl/dist/assets/owl.carousel.css">
    <link rel="stylesheet" href="owl/dist/assets/owl.theme.default.css">

</head>
<style>

    .bg-warning {
        background: #FFBF53 !important;
    }

    body {
        overflow-x: hidden;
    }

    .text-sm {
        font-size: 12px;
    }

    .text-xs {
        font-size: 10px;
    }

    .prod .cab .add {
        cursor: pointer !important;
    }

    .dest-am .prod .cab img {
        width: 8rem;
        transition: .3s;
    }

    .prod .cab img {
        transition: .3s;
    }

    .prod:hover .cab img {
        transform: scale(1.06);
        transition: .3s;
    }

    .dest-am .prod {
        border-radius: 15px;
        padding: .6rem;
        background: white !important;
    }

    .logo {
        height: 2em;
        margin-left: .8rem;
    }

    footer div a {
        font-weight: lighter;
    }

    span {
        font-weight: lighter;
    }

    .font-lighter {
        font-weight: lighter;
    }

    .create {
        background: #dc0202;
        color: white;
    }

    .the_menu {
        display: none;
    }

    @media (max-width: 760px) {

        .w-p{
            width: 95%;
        }

        .fixo {
            position: fixed;
        }

        .abs {
            position: absolute;
        }

        footer div span{
        font-size: 12px!important;
    }
        .wrap {
            flex-wrap: wrap;
        }

        .l-0 {
            left: 0;
        }

        .r-0 {
            right: 0;
        }

        .b-0 {
            bottom: 0;
        }

        .t-0 {
            top: 0;
        }

        .l-1 {
            left: 1rem;
        }

        .r-1 {
            right: 1rem;
        }

        .b-1 {
            bottom: 1rem;
        }

        .t-1 {
            top: 1rem;
        }
        .w-1001{
            width: 100%!important;
        }

        .pt-j{
            padding-top: 4.5rem!important;
        }
        
        .do_login{
            transform: translateX(-1000px);
        }

    }

    @media (min-width: 701px) {
        .w-1001{
            width: 90%!important;
        }
        
        .w-p{
            width: 50%;
        }
        
        
        .do_login{
            transform: translateY(-1200px);
        }

    }

    .pubs div img {
        height: 40%;
    }

    .carrinho {
        transform: translateX(1200px);
    }
    .no-scroll{
        overflow-x: hidden!important;
    }
    
    
    body::-webkit-scrollbar{
        width: 8px;
    }

    body::-webkit-scrollbar-button{
        width: 8px;
        background: red;
        border-radius: 60px;
    }

    body::-webkit-scrollbar-thumb{
        width: 8px;
        background: #FFBF53;
        border-radius: 60px;
    }
    div::-webkit-scrollbar-track{
        width: 4px;
        background: #ffffff;
    }
    div::-webkit-scrollbar{
        width: 4px;
    }

    div::-webkit-scrollbar-button{
        width: 4px;
        background: red;
        border-radius: 60px;
    }

    div::-webkit-scrollbar-thumb{
        width: 4px;
        background: #FFBF53;
        border-radius: 60px;
    }
    div::-webkit-scrollbar-track{
        width: 4px;
        background: #ffffff;
    }

    .pointer{
        cursor: pointer;
    }
    .alert-success{
        transform: translateY(-150px);
        transition: .3s;
    }

    .load_buy{
        animation: .6s load ease-out infinite;
    }

    @keyframes load {
        to{
            transform: rotate(360deg);
        }
    }

</style>

<body>

<input type="hidden" value="<?=$codigo?>" id="code_buy">


                    <div class="do_login" class="h-100 w-100 bg-white shadow-lg"
                            style="top: 0; bottom: 0; left: 0; position: fixed!important; background: #ffffffe2; display: grid; place-content: center; right: 0; z-index: 500;">

                            <div class="close_l rounded-circle text-white bg-danger pointer" title="Fechar menu" style="font-size: 40px; position: absolute;  top: 1rem; right:1rem; height: 2.5rem; width: 2.5rem; text-align: center; line-height: 1.7rem; box-shadow: 6px 3px 9px red; border: 2px solid orange">
                                &times;
                            </div>
                            <div class="bg-white p-4 rounded-3">
                            <h3 class="text-danger">Comece por criar uma conta</h3>
                            <span>Abra uma conta ou faça login para fazer uma compra</span><br>
                            <br>
                            <a href="login.php">
                            <a href="login.php"><button class="btn btn-outline-warning rounded-5 w-100">Fazer Login</button></a>
                            </a>
                            <button class="btn mt-3 create rounded-5 w-100">Criar Conta</button>
                        </div>
                    </div>

        <div class="carrinho p-3 bg-white w-p h-100 position-fixed" style="right: 0; tõp: 0; bottom: 0; z-index: 100; border-left: 2px solid red;">
            <div class="position-relative w-100 h-100">
            <div class="headd w-100 px-lg-4 my-2">
                <div class="close_car" style="border: 1px solid red; width: 1.5rem; height: 1.5rem; display: grid; place-content: center; cursor: pointer">&times;</div>
                <br>
                <h1 class="text-danger">Produtos no Carrinho</h1>
            </div>
            <div class="c_b" style="height: 85%!important;">  
                <div class="body_cart"  style="height: 90%!important; overflow-y: auto;">
                    
                    <?php
                    //somatorio de todas as contas
                    
                    $v1 = "SELECT sum(preco) FROM carrinho WHERE en_ip = '$codigo' AND placed='no'";
                    $vtt1 = $conexao->query($v1);
                    $vt1  = mysqli_fetch_array($vtt1);
                    $total = $vt1['sum(preco)'];
                        
                    
                    $get_p2211 = "SELECT * FROM carrinho WHERE en_ip = '$codigo' AND placed='no' ";
                    $con_p2211 = $conexao->query($get_p2211);
                    $lin1n = mysqli_num_rows($con_p2211);

                    while($dadd = mysqli_fetch_assoc($con_p2211)){
                        $ref_prod = $dadd['ref'];

                        

                            $sql_p = "SELECT * FROM produtos WHERE ref = '$ref_prod'";
                            $conm= $conexao->query($sql_p);

                            while ($dados_p = mysqli_fetch_array($conm)) {
                            
                        ?>
                        <div class="bg-light rounded-3 my-3 p-2 d-flex">
                            <img src="./partner/produtos_lojas/<?=$dados_p['foto_prod']?>" height="50em" alt="">
                            <div class="d-flex justify-content-between w-100" style="">
                                <div class="my-auto"><h5 class="text-secondary my-auto"><?=$dados_p['produto']?></h6></div>
                                <div class="d-flex">
                                    <div class="my-auto px-2 " style="background: #ffc7c774; font-size: 16px!important; border-radius: 50px; padding: .2rem;"><span class=" text-danger my-auto"><?=$dados_p['preco']." <span style='font-size: 9px'>AOA</span>"?></span></div>
                                    <!-- Generated by IcoMoon.io -->
                                    <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" title="Remover Produto" onclick="remover_prod('<?=$dadd['id']?>','<?=$dados_p['produto']?>')" width="14" fill="red" class="my-auto pointer ms-2" height="14" viewBox="0 0 24 24">
                                    <title>Remover Produto</title>
                                    <path d="M4.5 22.125c-0 0.003-0 0.006-0 0.008 0 0.613 0.494 1.11 1.105 1.116h12.79c0.612-0.006 1.105-0.504 1.105-1.117 0-0.003-0-0.006-0-0.009v0-15h-15zM6 8.625h12v13.125h-12z"></path>
                                    <path d="M7.875 10.125h1.5v9.375h-1.5v-9.375z"></path>
                                    <path d="M11.25 10.125h1.5v9.375h-1.5v-9.375z"></path>
                                    <path d="M14.625 10.125h1.5v9.375h-1.5v-9.375z"></path>
                                    <path d="M15.375 4.125v-2.25c0-0.631-0.445-1.125-1.013-1.125h-4.725c-0.568 0-1.013 0.494-1.013 1.125v2.25h-5.625v1.5h18v-1.5zM10.125 2.25h3.75v1.875h-3.75z"></path>
                                    </svg>

                                </div>
                            </div>
                        </div>


                    <?php
                            }



                    }

                    if($lin1n <= 0){
                        
                    ?>

<center>
    <br><br><br><br>
    <!-- Generated by IcoMoon.io -->
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="114" height="114" class="text-secondary" fill="currentColor" viewBox="0 0 24 24">
<title>list</title>
<path d="M9.75 3.75h12.375v1.5h-12.375v-1.5z"></path>
<path d="M4.875 1.5c-1.657 0-3 1.343-3 3s1.343 3 3 3c1.657 0 3-1.343 3-3v0c-0.002-1.656-1.344-2.998-3-3h-0zM4.875 6c-0.828 0-1.5-0.672-1.5-1.5s0.672-1.5 1.5-1.5c0.828 0 1.5 0.672 1.5 1.5v0c-0.001 0.828-0.672 1.499-1.5 1.5h-0z"></path>
<path d="M9.75 11.25h12.375v1.5h-12.375v-1.5z"></path>
<path d="M4.875 9c-1.657 0-3 1.343-3 3s1.343 3 3 3c1.657 0 3-1.343 3-3v0c-0.002-1.656-1.344-2.998-3-3h-0zM4.875 13.5c-0.828 0-1.5-0.672-1.5-1.5s0.672-1.5 1.5-1.5c0.828 0 1.5 0.672 1.5 1.5v0c-0.001 0.828-0.672 1.499-1.5 1.5h-0z"></path>
<path d="M9.75 18.75h12.375v1.5h-12.375v-1.5z"></path>
<path d="M4.875 16.5c-1.657 0-3 1.343-3 3s1.343 3 3 3c1.657 0 3-1.343 3-3v0c-0.002-1.656-1.344-2.998-3-3h-0zM4.875 21c-0.828 0-1.5-0.672-1.5-1.5s0.672-1.5 1.5-1.5c0.828 0 1.5 0.672 1.5 1.5v0c-0.001 0.828-0.672 1.499-1.5 1.5h-0z"></path>
</svg>
<br>
<br><br>
<span class="text-secondary">Seu carrinho de compras está está vazio <br> Faça login e vamos às compras <b>#BOSS</b></span>
</center>
                    <?php
                        }
                    ?>

                </div>


                
<center>
    <br>
    <div class="loader">


    </div>
</center>


            </div>
                 <div class="topt w-100 rounded-3 position-absolute py-2 bg-warning px-2 text-white d-flex justify-content-between" style="right: 0; left-0; bottom: 0!important;">
                    <span style="font-size: 20px" class="my-auto">Total: <b class="total_price"><?php if($total == null){ echo 0; } else { echo $total;}?> AOA</b></span>
                    <?php
                        if(!isset($_SESSION['id'])){
                    ?>
                        <a href="login.php"><button class="btn btn-outline-danger">Faça Login</button></a>
                    <?php
                        }

                        else {

                    ?>

                        <button class="btn place_order btn-danger">Finalizar</button>


                    <?php
                        }
                    ?>
                 </div>
            </div>
        </div>
            <div class="d-flex py-4 px-3 w-100 bg-warning position-fixed wrap gap-2" style="z-index: 10; left-0 right: 0; top: 0; margin: 0!important">
                <div class=" d-flex ">
                    <div class="my-auto position-relative d-flex">
                        <!-- Generated by IcoMoon.io -->
                        <svg fill="red" id="open_menu" style="cursor: pointer" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <title>menu</title>
                            <path d="M3.75 4.5h16.5v1.5h-16.5v-1.5z"></path>
                            <path d="M3.75 11.25h16.5v1.5h-16.5v-1.5z"></path>
                            <path d="M3.75 18h16.5v1.5h-16.5v-1.5z"></path>
                        </svg>

                        <img src="img/banner_p.png" alt="" class="navbar-brand logo ">

                        <!--Começo do menu onde tem login e criar conta-->
                        
                        <?php
                            if (isset($_SESSION['id'])) {
                              
                                
                                ?>
                                <div class="position-absolute the_menu shadow-lg rounded-3 bg-light py-4 px-3 " style="top: 3.5rem; left: .6rem; border: 1px solid gray;  z-index: 10; width: 20rem;">
                            <h3 class="text-danger"><?=$nome?></h3>
                            <span>Tel: +244 <?=$tel?></span><br>
                            <span>Email: <?=$email?></span><br>
                            <span>End. <?=$end?></span><br>
                            <br>
                            <center><span class="text-warning">Conta activa desde <?=$end?></span></center>
                            <a href="create_account.php"><button class="btn mt-3 create rounded-5 w-100">Apagar Conta</button></a><br>
                            <center><a href="sair.php">Sair</a></center>
                        </div>

                                <?php



                            }
                            else{

                        ?>
                        
                        <div class="position-absolute the_menu shadow-lg rounded-3 bg-light py-4 px-3 "
                            style="top: 3.5rem; z-index: 10; width: 20rem;">
                            <h3 class="text-danger">Comece por criar uma conta</h3>
                            <span>Abra uma conta e complete sua lista de compras</span><br>
                            <br>
                            <a href="login.php">
                            <button class="btn btn-outline-warning rounded-5 w-100">Fazer Login</button>
                            </a>
                            <button class="btn mt-3 create rounded-5 w-100">Criar Conta</button>
                        </div>

                        <?php
                            }
                        ?>
                    </div>
                </div>

                <div class="my-auto w-1001  " >
                    <div class="input py-1 w-100 my-auto bg-white rounded-pill"><svg class="mx-3" height="2em"
                            width="2em" fill="#ea8e16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460 512">
                            <path
                                d="M220.6 130.3l-67.2 28.2V43.2L98.7 233.5l54.7-24.2v130.3l67.2-209.3zm-83.2-96.7l-1.3 4.7-15.2 52.9C80.6 106.7 52 145.8 52 191.5c0 52.3 34.3 95.9 83.4 105.5v53.6C57.5 340.1 0 272.4 0 191.6c0-80.5 59.8-147.2 137.4-158zm311.4 447.2c-11.2 11.2-23.1 12.3-28.6 10.5-5.4-1.8-27.1-19.9-60.4-44.4-33.3-24.6-33.6-35.7-43-56.7-9.4-20.9-30.4-42.6-57.5-52.4l-9.7-14.7c-24.7 16.9-53 26.9-81.3 28.7l2.1-6.6 15.9-49.5c46.5-11.9 80.9-54 80.9-104.2 0-54.5-38.4-102.1-96-107.1V32.3C254.4 37.4 320 106.8 320 191.6c0 33.6-11.2 64.7-29 90.4l14.6 9.6c9.8 27.1 31.5 48 52.4 57.4s32.2 9.7 56.8 43c24.6 33.2 42.7 54.9 44.5 60.3s.7 17.3-10.5 28.5zm-9.9-17.9c0-4.4-3.6-8-8-8s-8 3.6-8 8 3.6 8 8 8 8-3.6 8-8z" />
                        </svg><input class="w-75" type="search" style="border: none; outline: none;"
                            placeholder="Pesquisar"></div>
                </div>
                <div style="top: 5%; right: 4%; cursor: pointer;" class="my-2 abs open_car my-lg-0 my-md-0 my-xl-0 my-sm-0 d-flex ">

                    <div style="background: #000; color: white" class="cart px-3 rounded-pill position-relative py-2 my-auto">
                        <div class="position-absolute c" style="background: #fff; top: -.75rem; width: 1.5rem; height: 1.5rem; color: black; display: grid; place-content: center; border: 2px solid black; border-radius: 100px; left: 0;"> 
                                <?php

                                    $get_p221 = "SELECT * FROM carrinho WHERE en_ip = '$codigo' AND placed = 'no'";
                                    $con_p221 = $conexao->query($get_p221);
                                    $linn = mysqli_num_rows($con_p221);
                                    if ($linn < 0) {
                                        echo 0;
                                    }
                                    else {
                                        echo "<span class='num_c'>".$linn."</span>";
                                    }
                                ?>
                        </div>
                            <!-- Generated by IcoMoon.io -->
                            <svg fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <title>carrinho</title>
                                <path
                                    d="M7.5 4.502v1.5h14.25v2.969l-1.664 5.281h-13.058l-1.875-13.502h-4.403v1.5h3.097l1.875 13.502h15.464l2.064-6.55v-4.7h-15.75z">
                                </path>
                                <path
                                    d="M8.296 17.266c-1.656 0.002-2.998 1.344-3 3v0c0 1.657 1.343 3 3 3s3-1.343 3-3v0-0c-0.002-1.656-1.344-2.998-3-3h-0zM8.296 21.766c-0.828 0-1.5-0.672-1.5-1.5s0.672-1.5 1.5-1.5c0.828 0 1.5 0.672 1.5 1.5v0c-0.001 0.828-0.672 1.499-1.5 1.5h-0z">
                                </path>
                                <path
                                    d="M18.796 17.266c-1.656 0.002-2.998 1.344-3 3v0c0 1.657 1.343 3 3 3s3-1.343 3-3v0-0c-0.002-1.656-1.344-2.998-3-3h-0zM18.796 21.766c-0.828 0-1.5-0.672-1.5-1.5s0.672-1.5 1.5-1.5c0.828 0 1.5 0.672 1.5 1.5v0c-0.001 0.828-0.672 1.499-1.5 1.5h-0z">
                                </path>
                            </svg>

                    </div>
                </div>
            </div>
            </div>
            
        </div>
    <div class="nav bg-warning pt-j px-4 py-3">
         
    
        <div class="container bg-warning">
            
            <br><br>
            <?php
                if(isset($_SESSION['id'])){
            ?>
            <br>
        <div class="w-100" style="flex: 4;"><center>Bom dia <b>#BOSS <?=$primeiro_nome?></b></center></div>
           <?php

                }
                else{
                    echo "";
                }

            ?>
            <div class="pub-area mt-4">
                <center>
                    <div class="pubs owl-carousel owl-theme" style="display: inline-flex; gap: 2px!important;">
                        <div class="img">
                            <img src="img/pub1.png" class="" alt="">
                        </div>
                        <div class="img">
                            <img src="img/pub2.png" class="" alt="">
                        </div>
                        <div class="img">
                            <img src="img/pub3.png" class="" alt="">
                        </div>
                        <div class="img">
                            <img src="img/pub4.jpg" class="" alt="">
                        </div>
                        <div class="img">
                            <img src="img/pub5.png" class="" alt="">
                        </div>
                    </div>
                </center>
            </div>
            <!--Fechamento das divs de publicidade-->
            <div class="destaques  gap-3 flex-wrap py-3 py d-flex">
                <div class="bg-white px-3 rounded-pill py-2">
                    <a style="text-decoration: none" href="#bebidas"><span class="text-dark text-lg">Bebidas</span></a>
                </div>
                <div class="bg-white px-3 rounded-pill py-2">
                    <span class="text-dark text-lg">Cosméticos</span></a>
                </div>
                <div class="bg-white px-3 rounded-pill py-2">
                    <a style="text-decoration: none" href="#alcohol"><span class="text-dark text-lg">Alcool</span></a>
                </div>
                <div class="bg-white px-3 rounded-pill py-2">
                    <a style="text-decoration: none" href="#pastelaria"><span class="text-dark text-lg">Pastelaria</span></a>
                </div>
                <div class="bg-white px-3 rounded-pill py-2">
                    <a style="text-decoration: none" href="#pastelaria"><span class="text-dark text-lg">Padaria</span></a>
                </div>
                <div class="bg-white px-3 rounded-pill py-2">
                    <a style="text-decoration: none" href="#outros"><span class="text-dark text-lg">Outros</span></a>
                </div>
                <div class="bg-white px-3 rounded-pill py-2">
                    <span class="text-dark text-lg">Higiene</span>
                </div>
                <div class="bg-white px-3 rounded-pill py-2">
                    <span class="text-dark text-lg">Frutas</span>
                </div>
                <div class="bg-white px-3 rounded-pill py-2">
                    <span class="text-dark text-lg">Verduras</span>
                </div>
            </div>
            <!--fexhamento da div dos destaques -->
        </div>
        <!--Fechamenoto do container dentro da nav-->
    </div>
    <!--Fechamento do cabeçalho da navegação-->



    <br>


    <br>
    <div class="shadow alert alert-success" style="position: fixed; top: .3rem; left: .4rem; z-index: 400!important;">
        
    </div>

    <style>
        .loja{
            transition: .2s;
        }
        .loja:hover{
            transition: .3s;
            transform: translateY(-8px);
        }
    </style>
    
    <div class="container">
        <a href="./home/" class="btn btn btn-outline-warning"> &LeftArrow; Dashboard</a>
    </div>

    <div class="mercados py-3 px-4 container bg-light">
        <h3 class="h4">Compre no mercado mais próximo de sí</h3><br>
        <div class="lojas mx-auto gap-4 d-flex flex-wrap">
            
        <?php

        $get_l = "SELECT * FROM lojas";
        $con_l = $conexao->query($get_l);

        while($loja = mysqli_fetch_array($con_l)){

        ?>
            <div class="loja position-relative bg-white p-3 rounded-2 shadow" style="width: 12rem;">
                <div class="head" style="width: 16rem;">
                </div>
                <div class="selo bg-warning " style="position: absolute; right: 0; top: 0; padding-right: .6rem; padding-left: .3rem; padding-bottom: .2rem; color: white; border-top-right-radius: 0.375rem; border-bottom-left-radius: 0.375rem">
                <svg fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 24 24">
                                <title>carrinho</title>
                                <path
                                    d="M7.5 4.502v1.5h14.25v2.969l-1.664 5.281h-13.058l-1.875-13.502h-4.403v1.5h3.097l1.875 13.502h15.464l2.064-6.55v-4.7h-15.75z">
                                </path>
                                <path
                                    d="M8.296 17.266c-1.656 0.002-2.998 1.344-3 3v0c0 1.657 1.343 3 3 3s3-1.343 3-3v0-0c-0.002-1.656-1.344-2.998-3-3h-0zM8.296 21.766c-0.828 0-1.5-0.672-1.5-1.5s0.672-1.5 1.5-1.5c0.828 0 1.5 0.672 1.5 1.5v0c-0.001 0.828-0.672 1.499-1.5 1.5h-0z">
                                </path>
                                <path
                                    d="M18.796 17.266c-1.656 0.002-2.998 1.344-3 3v0c0 1.657 1.343 3 3 3s3-1.343 3-3v0-0c-0.002-1.656-1.344-2.998-3-3h-0zM18.796 21.766c-0.828 0-1.5-0.672-1.5-1.5s0.672-1.5 1.5-1.5c0.828 0 1.5 0.672 1.5 1.5v0c-0.001 0.828-0.672 1.499-1.5 1.5h-0z">
                                </path>
                            </svg>
                </div>
                <div class="corpo_loja">
                    <b><?=$loja['loja']?> </b><br>
                    <span style="font-size: 12px;">
                        <!-- Generated by IcoMoon.io -->
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24">
                        <title>localização</title>
                        <path d="M11.903 5.981c-1.657 0-3 1.343-3 3s1.343 3 3 3c1.657 0 3-1.343 3-3v0c-0.002-1.656-1.344-2.998-3-3h-0zM11.903 10.481c-0.828 0-1.5-0.672-1.5-1.5s0.672-1.5 1.5-1.5c0.828 0 1.5 0.672 1.5 1.5v0c-0.001 0.828-0.672 1.499-1.5 1.5h-0z"></path>
                        <path d="M20.011 8.13c-0.443-4.123-3.904-7.306-8.109-7.306-4.503 0-8.153 3.65-8.153 8.153 0 1.655 0.493 3.195 1.34 4.48l-0.019-0.031 5.668 8.701c0.252 0.382 0.678 0.631 1.163 0.631s0.912-0.249 1.16-0.625l0.003-0.005 5.668-8.701c0.828-1.257 1.321-2.799 1.321-4.456 0-0.296-0.016-0.588-0.046-0.876l0.003 0.036zM17.477 12.607l-5.574 8.557-5.574-8.557c-1.706-2.619-1.34-6.125 0.87-8.335 1.204-1.204 2.867-1.949 4.704-1.949s3.5 0.745 4.704 1.949v0c2.21 2.21 2.576 5.716 0.87 8.335z"></path>
                        </svg>
                        <?=$loja['endereco']?>
                        </span><br>
                        <a href="loja.php?l=<?=base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($loja['codigo']))))))))))?>"><button class="my-2 rounded-pill btn w-100 btn-outline-warning">Ver Loja</button></a>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
<br><br><br>
    <main class="container">
                
            <?php

                $get_p22 = "SELECT * FROM produtos WHERE categoria = 'Bebida' ";
                $con_p22 = $conexao->query($get_p22);
                $lin = mysqli_num_rows($con_p22);


            ?>
        <div id="bebidas" class="head-title d-flex justify-content-between">
            <h3><b>Bebidas</b></h3>
            
        </div>
        <hr>
        <br>
        <div class="owl-carousel first-head owl-theme">


                
                    <?php

                        $get_p22 = "SELECT * FROM produtos WHERE categoria = 'Bebida' ";
                        $con_p22 = $conexao->query($get_p22);
                        $lin = mysqli_num_rows($con_p22);
                        while($dad = mysqli_fetch_array($con_p22)){

                    ?>

                    <div class="prod" style="width: 10rem">
                        <div class="cab"
                            style="position: relative; height: 10rem; display: grid; place-content: center; width:10rem;">
                            <img src="./partner/produtos_lojas/<?=$dad['foto_prod']?>" style="height: 100%" alt="">
                            
                            <?php
                             if(isset($_SESSION['id'])) {
                               

                            ?>
                                <div style="cursor: pointer; bottom: 0; right: 0; display: grid; place-content: center; color: white; position: absolute; width: 2em; height: 2em;"
                                    class="bg-warning shadow-lg rounded-circle" onclick="add_prod('<?=$dad['ref']?>','<?=$dad['produto']?>','<?=$dad['preco']?>')" >
                                    <!-- Generated by IcoMoon.io -->
                                    <svg fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <title>Adicionar ao carrinho</title>
                                        <path
                                            d="M20.625 11.25h-7.875v-7.875h-1.5v7.875h-7.875v1.5h7.875v7.875h1.5v-7.875h7.875v-1.5z">
                                        </path>
                                    </svg>
                                </div>
                             <?php 
                             }
                             else{
                                ?>

                                    <div style="cursor: pointer; bottom: 0; right: 0; display: grid; place-content: center; color: white; position: absolute; width: 2em; height: 2em;" class="bg-warning shadow-lg rounded-circle" onclick="do_login()" >
                                        <!-- Generated by IcoMoon.io -->
                                        <svg fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <title>Adicionar ao carrinho</title>
                                            <path
                                                d="M20.625 11.25h-7.875v-7.875h-1.5v7.875h-7.875v1.5h7.875v7.875h1.5v-7.875h7.875v-1.5z">
                                            </path>
                                        </svg>
                                    </div>

                                <?php
                             }
                                ?> 
                            
                                
                        </div>
                        <div class="rab">
                            <b><?=$dad['produto']?></b><br>
                            <span class="text-sm"> <?=$dad['preco']?> AOA</span><br>
                            <span class="text-secondary text-sm">Ref: <?=$dad['ref']?></span>
                        </div>
                    </div>

                    
                    <?php
                        }
                    ?>
        </div>
        <!--Termino da div onde tem os primeiros produtos , primeira linha, termino da div da area das bebidas-->

        <!---------------------------------------------------------------------------->
        <br>

        <div id="pastelaria" class="p-5 dest-am" style="background: rgba(255, 230, 0, 0.433); border-radius: 25px;">
            <div class="head-title d-flex justify-content-between">

                <div>
                    <h3><b>Frituras & Grelhados</b></h3>
                    <span>A festa não para, mande mais coisas para o seu carrinho <b>#BOSS</b></span><br><br>
                </div>
               
            </div>
            <br>
            <div class="owl-carousel first-head owl-theme">
                
                     
                    <?php

                        $get_p222 = "SELECT * FROM produtos WHERE categoria = 'pastelaria' ";
                        $con_p222 = $conexao->query($get_p222);
                        $lin2 = mysqli_num_rows($con_p222);

                        if($lin2 <= 0){
                            echo "<div class='text-center w-100'><span class='text-secondary'> Não há nenhum produto para apresentar</span></div>";
                        }
                        else{
                            while( $past_prod = mysqli_fetch_array($con_p222)){
                    ?>
                <div class="prod" style="width: 10rem">
                <div class="cab"
                            style="position: relative; height: 10rem; display: grid; place-content: center; width:10rem;">
                            <img src="./partner/produtos_lojas/<?=$past_prod['foto_prod']?>" style="height: 100%" alt="">
                            
                            <?php
                             if(isset($_SESSION['id'])) {
                               

                            ?>
                                <div style="cursor: pointer; bottom: 0; right: 0; display: grid; place-content: center; color: white; position: absolute; width: 2em; height: 2em;"
                                    class="bg-warning shadow-lg rounded-circle" onclick="add_prod('<?=$past_prod['ref']?>','<?=$past_prod['produto']?>')" >
                                    <!-- Generated by IcoMoon.io -->
                                    <svg fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <title>Adicionar ao carrinho</title>
                                        <path
                                            d="M20.625 11.25h-7.875v-7.875h-1.5v7.875h-7.875v1.5h7.875v7.875h1.5v-7.875h7.875v-1.5z">
                                        </path>
                                    </svg>
                                </div>
                             <?php 
                             }
                             else{
                                ?>

                                    <div style="cursor: pointer; bottom: 0; right: 0; display: grid; place-content: center; color: white; position: absolute; width: 2em; height: 2em;" class="bg-warning shadow-lg rounded-circle" onclick="do_login()" >
                                        <!-- Generated by IcoMoon.io -->
                                        <svg fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <title>Adicionar ao carrinho</title>
                                            <path
                                                d="M20.625 11.25h-7.875v-7.875h-1.5v7.875h-7.875v1.5h7.875v7.875h1.5v-7.875h7.875v-1.5z">
                                            </path>
                                        </svg>
                                    </div>

                                <?php
                             }
                                ?> 
                            
                                
                        </div>
                    <div class="rab">
                            <b><?=$past_prod['produto']?></b><br>
                            <span class="text-sm"> <?=$past_prod['preco']?> AOA</span><br>
                            <span class="text-secondary text-sm">Ref: <?=$past_prod['ref']?></span>
                        </div>
                </div>
                <?php
                            }
                        }
                ?>
                <!--Termino da div de produto , cada produto-->
               
            </div>
            <!--Termino da div onde tem os primeiros produtos , primeira linha-->

        </div>

        <br><br> <br>
        <!-- Termino da div onde tem os produtos de pastelaria-->

        <!--------------------------------------------------------------------->
       
       
       <?php

        $get_p232 = "SELECT * FROM produtos WHERE categoria = 'Bebida' ";
        $con_p232 = $conexao->query($get_p232);
        $lin3 = mysqli_num_rows($con_p232);


        ?>
        <div id="outros" class="head-title d-flex justify-content-between">
        <h3><b>Outros Produtos</b></h3>

        </div>
        <hr>
        <br>
        <div class="owl-carousel first-head owl-theme">



            <?php

                $get_p242 = "SELECT * FROM produtos WHERE categoria = 'Outros' ";
                $con_p242 = $conexao->query($get_p242);
                $lin4 = mysqli_num_rows($con_p242);

                if($lin4 <= 0){
                    echo "<div class='text-center w-100'><span class='text-secondary'> Não há nenhum produto para apresentar</span></div>";
                }
                else{
                    while($out = mysqli_fetch_array($con_p242)){

            ?>

            <div class="prod" style="width: 10rem">
                <div class="cab"
                    style="position: relative; height: 10rem; display: grid; place-content: center; width:10rem;">
                    <img src="./partner/produtos_lojas/<?=$out['foto_prod']?>" style="height: 100%" alt="">
                    
                    <?php
                    if(isset($_SESSION['id'])) {
                    

                    ?>
                        <div style="cursor: pointer; bottom: 0; right: 0; display: grid; place-content: center; color: white; position: absolute; width: 2em; height: 2em;"
                            class="bg-warning shadow-lg rounded-circle" onclick="add_prod('<?=$out['ref']?>','<?=$out['produto']?>')" >
                            <!-- Generated by IcoMoon.io -->
                            <svg fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <title>Adicionar ao carrinho</title>
                                <path
                                    d="M20.625 11.25h-7.875v-7.875h-1.5v7.875h-7.875v1.5h7.875v7.875h1.5v-7.875h7.875v-1.5z">
                                </path>
                            </svg>
                        </div>
                    <?php 
                    }
                    else{
                        ?>

                            <div style="cursor: pointer; bottom: 0; right: 0; display: grid; place-content: center; color: white; position: absolute; width: 2em; height: 2em;" class="bg-warning shadow-lg rounded-circle" onclick="do_login()" >
                                <!-- Generated by IcoMoon.io -->
                                <svg fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <title>Adicionar ao carrinho</title>
                                    <path
                                        d="M20.625 11.25h-7.875v-7.875h-1.5v7.875h-7.875v1.5h7.875v7.875h1.5v-7.875h7.875v-1.5z">
                                    </path>
                                </svg>
                            </div>

                        <?php
                    }
                        ?> 
                    
                        
                </div>
                <div class="rab">
                    <b><?=$out['produto']?></b><br>
                    <span class="text-sm"> <?=$out['preco']?> AOA</span><br>
                    <span class="text-secondary text-sm">Ref: <?=$out['ref']?></span>
                </div>
    </div>

    
    <?php
            }
        }
    ?>
</div>
<!--Termino da div onde tem os ultimos produtos , outros produtos -->


    </main>

    <br><br><br>


    <footer class="bg-warning py-3">
        <br>
        <div class="container">
            <div class="footer row">
                <div class="col-12 col-md-3 col-lg-3 col-sm-6 col-xl-3">
                    <img src="img/banner_p.png" height="40px" alt="">
                    <br><br>
                    <span class="text-danger">Luanda, Kilamba.</span>
                </div>
                <div class="col-12 col-md-3 col-lg-3 col-sm-6 col-xl-3">
                    <br>
                    <h5 class="text-white">Trabalhe connosco</h5>
                    <a href="#" class="text-white text-decoration-none">Torne se um parceiro</a><br>
                    <a href="#" class="text-white text-decoration-none">Torne se um Entregador</a><br>
                    <a href="#" class="text-white text-decoration-none">Anuncios</a>
                </div>
                <div class="col-12 col-md-3 col-lg-3 col-sm-6 col-xl-3"> <br>
                    <h5 class="text-white">Empresa</h5>
                    <a href="#" class="text-white text-decoration-none">Sobre nós</a><br>
                    <a href="#" class="text-white text-decoration-none">FAQs</a><br>
                    <a href="#" class="text-white text-decoration-none">Parceiro perto de sí</a>
                </div>
                <div class="col-12 col-md-3 col-lg-3 col-sm-6 col-xl-3"> <br>
                    <h5 class="text-white">Ajuda e Suporte</h5>
                    <a href="tel:244946445629" class="text-white text-decoration-none">+244 946 445 629</a><br>
                    <a href="#" class="text-white text-decoration-none">Contacte nos</a><br>
                    <a href="#" class="text-white text-decoration-none">Anuncios</a>
                </div>
            </div><!-- Termino da parte dos conteudos do footer e dados da emoresa -->
            <br><br><br>
            <div class="foot-2 d-flex justify-content-between">
                <div class="copyright font-lighter text-white">2022 Meu Carrinho, Ltda &middot; <a href="#"
                        class="text-decoration-none text-white " style="text-decoration: underline ;">Termos e
                        condições</a></div>
                <div class="mideas gap-2 d-flex">
                    <svg fill="white" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path
                            d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                    </svg>

                    <svg fill="white" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                    </svg>

                    <svg fill="white" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" />
                    </svg>

                </div>
            </div>
        </div>
        <br>
    </footer>

    <div style="right: 1rem; bottom: 2rem; position: fixed" class="bg-danger p-2 fixo">
        <!-- Generated by IcoMoon.io -->
        <svg fill="white" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <title>chat-bubble</title>
        <path d="M21.010 18.399c1.431-1.275 2.24-2.974 2.24-4.738 0-1.874-0.877-3.627-2.471-4.936-1.55-1.274-3.603-1.975-5.779-1.975s-4.229 0.701-5.779 1.975c-1.593 1.309-2.471 3.062-2.471 4.936s0.877 3.627 2.471 4.936c1.55 1.273 3.603 1.975 5.779 1.975 0.29 0 0.582-0.013 0.871-0.038l0.494 0.428c1.634 1.422 3.783 2.288 6.134 2.288h0.75v-1.596l-0.22-0.22c-0.844-0.847-1.527-1.855-1.998-2.974l-0.023-0.061zM17.348 19.828l-0.992-0.86-0.331 0.041c-0.308 0.040-0.664 0.062-1.025 0.062h-0c-3.722 0-6.75-2.427-6.75-5.411s3.028-5.411 6.75-5.411 6.75 2.427 6.75 5.411c0 1.486-0.742 2.874-2.088 3.907l-0.432 0.331 0.199 0.564c0.439 1.219 1.040 2.272 1.792 3.199l-0.016-0.020c-1.493-0.255-2.805-0.899-3.867-1.823l0.010 0.008z"></path>
        <path d="M2.821 14.882c0.672-0.845 1.225-1.823 1.609-2.882l0.023-0.072 0.198-0.561-0.432-0.331c-1.27-0.974-1.969-2.282-1.969-3.682 0-2.814 2.86-5.103 6.375-5.103 2.586 0 4.817 1.239 5.816 3.014 0.185-0.009 0.372-0.014 0.559-0.014q0.564 0 1.117 0.055c-0.386-1-1.056-1.913-1.978-2.67-1.48-1.215-3.438-1.885-5.514-1.885s-4.035 0.669-5.514 1.885c-1.522 1.251-2.361 2.926-2.361 4.718 0 1.678 0.766 3.295 2.121 4.511-0.467 1.107-1.109 2.052-1.902 2.847l-0.219 0.219v1.57h0.75c1.456-0 2.831-0.349 4.046-0.967l-0.051 0.023c-0.128-0.466-0.213-1.006-0.237-1.562l-0.001-0.015c-0.702 0.419-1.519 0.733-2.39 0.895l-0.046 0.007z"></path>
        </svg>
    
    </div>

    <script>
        function add_prod(prod_ref, produto, preco){
            var ref = prod_ref;
            var prod = produto;
            var code_comp = $("#code_buy").val();
            var dados = {
                reff: ref,
                prod: prod,
                preco: preco,
                code_buy: code_comp,
            };
            $.post('./func_files/place_order.php', dados, function(req, res){
                
                $(".c_b").load(" .body_cart");
                $(".total_price").load(" .total_price");
                $(".alert-success").html(req);
                $(".alert-success").css({
                    'transform':'translateY(0)',
                    'transition':'.3s',
                });

                setTimeout(() => {
                $(".alert-success").css({
                    'transform':'translateY(-150px)',
                    'transition':'.3s',
                });
                }, 3000);
            });
        }

        function remover_prod(prod_id, produto){
            var id = prod_id;
            var dados = {
                id: id,
                prod: produto,
            };
            $.post('./func_files/remover_prod.php', dados, function(req, res){
                $(".alert-success").html(req);
                $(".alert-success").css({
                    'transform':'translateY(0)',
                    'transition':'.3s',
                });
                
                setTimeout(() => {
                $(".alert-success").css({
                    'transform':'translateY(-150px)',
                    'transition':'.3s',
                });
                }, 3000);

                $(".c_b").load(" .body_cart");
                $(".total_price").load(" .total_price");
            });
        }

            function do_login(){
                $(".do_login").css({
                    'transform':'translateX(0)',
                    'transition':'.3s',
                });
            };
            
            
            $(".close_l").click(function (){
                $(".do_login").css({
                    'transform':'translateX(-2500px)',
                    'transition':'.3s',
                });
            });

            $(".place_order").click(function(){
                $(".body_cart").slideUp("fast");
                $(".loader").html("<div class='load_buy' style='border:6px solid red; height: 2.2rem; width: 2.2rem; border-bottom: 6px solid white; border-radius: 100px; z-index: 1000;'></div><br><br><span class=''text-secondary'>Aguarde, Processando Compra...</span>");
                
            var user = $("#code_buy").val();
                var dados = {
                    user: user,
                };
            $.post('./func_files/finalizar_compra.php', dados, function(req, res){
                setTimeout(() => {
                    $(".loader").html("<img src='img/del.jpg' height='90em'><br><br> <span class='text-secondary'>Sua compra está a caminho</span><br><br><a class='btn btn-outline-success' href='./home/compras_all.php'>Verificar suas compras</a>");
                }, 5600);
            })
               
            })
        


        $("#open_menu").click(function () {
            $(".the_menu").fadeToggle("fast");
            $(this).toggleClass("bg-white rounded-2 text-danger");
            $("body").addClass('no-scroll');
        });

        $('.pubs').owlCarousel({
            loop: true,
            margin: 60,
            autoWidth: false,
            indicators: false,
            autoplay: true,
            autoplayTimeout: 1500,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 3,
                    nav: false,
                    loop: true
                },
                1300: {
                    items: 4,
                    nav: false,
                    loop: true
                }
            }
        });


        $('.first-head').owlCarousel({
            loop: false,
            margin: 40,
            autoWidth: false,
            indicators: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    nav: false
                },
                400: {
                    items: 2,
                    nav: false
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 4,
                    nav: false,
                    loop: false
                },
                1300: {
                    items: 5,
                    nav: false,
                    loop: false
                }
            }
        });

        $(".close_car").click(function () {
            $(".carrinho").css({
            'transform':'translateX(800px)',
            'transition':'.3s'
        });
        })

        $(".open_car").click(function () {
            $(".carrinho").css({
            'transform':'translateX(0)',
            'transition':'.3s'
        });
        })

        $(".c").css({
            'margin-top':'.4rem',
        })

       setInterval(() => {
        $(".c").load(" .num_c");
       
       }, 100);

    </script>
</body>
</html>