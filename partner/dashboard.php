<?php
session_start();
?>

<?php

include_once("./functions/conexao.php");


if (isset($_SESSION['codigo'])) {
    
    $codigo = $_SESSION['codigo'];

    
    $get_p = "SELECT * FROM lojas WHERE codigo='$codigo'";
    $con_p = $conexao->query($get_p);
    $loja = mysqli_fetch_array($con_p);
    
   $lojaa = $loja['loja'];
   $email = $loja['email'];
   $dono = $loja['dono'];
    $telefone_loja = $loja['telefone'];
    $quando = $loja['quando'];
    $estado = $loja['obs'];
    $ref = $loja['outro'];
    $endereco = $loja['endereco'];
 
}

else{
    header("location: ../");
}

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="200">
    <title>Dashboard <?=$lojaa?> | Meu Carrinho</title>
    <link rel="shortcut icon" href="../img/logo.jpeg" type="image/x-icon">
    <script src="../jquery.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.js.map"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../owl/dist/owl.carousel.js"></script>
    <script src="../alerts/dist/sweetalert2.js"></script>
    <script src="../alerts//dist/sweetalert2.js"></script>
    <link rel="stylesheet" href="../alerts/dist/sweetalert2.css">
    <link rel="stylesheet" href="../owl/dist/assets/owl.carousel.css">
    <link rel="stylesheet" href="../owl/dist/assets/owl.theme.default.css">

</head>
<style>
    .swal2-container{
        z-index: 200000!important;
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
    .swal2-container div button{
        background: #FFBF53!important;
    }
    .bg-warning {
        background: #FFBF53 !important;
    }

    .font-thin{
        font-weight: lighter;
    }

    table tbody tr td{
        font-weight: lighter;
        font-size: 13px;
    }

    footer div span{
        font-size: 12px!important;
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

        .fixo {
            position: fixed;
        }

        .abs {
            position: absolute;
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

        .w-50{
            width: 50%!important;
        }
    }

    
    .pop_add{
            transform: translateX(-1900px);
        }
    .pop_minus{
            transform: translateX(-1900px);
        }
    
    .w-50{
            width: 45%!important;
        }
</style>


<div class="position-fixed pop_add r-0 l-0 t-0 b-0" style="top: 0; bottom: 0; left: 0; right: 0; z-index: 10000; background: #ffc053a9; display: grid; place-content: center;">
    <div class="bg-white p-3 mx-auto rounded-3 shadow w-50">
        <span class="text-danger fechar_prod" style="float: right; cursor: pointer;">Fechar</span>
        <h4 class="text-warning">Adicionar Produto</h4>
        <div class="row">
            <div class="col-12 my-2 col-md-6">
                <label for="" style="font-size: 10px;">Foto (90x90) PNG</label>
                <input type="file" name="" id="pic" class="form-control">
            </div>
            <div class="col-12 my-2 col-md-6">
                <div class="row">
                    <div class="col-6 col-md-6">
                        <label for="" style="font-size: 10px;">Quantidade</label>
                        <input type="number" name="" id="qnt" placeholder="00" class="form-control">
                    </div>
                    <div class="col-6 col-md-6">
                        <label for="" style="font-size: 10px;">Preço (AOA)</label>
                        <input type="number" name="" id="preco" placeholder="00.00 AOA" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-12 my-2 col-md-12">
                <input type="hidden" name="" id="vendedor" value="123456">
                <label for="" style="font-size: 10px;">Categoria </label>
                
                <select name="" class="form-control" id="cat">
                    <option value="bebida">Bebidas</option>
                    <option value="Alimento">Alimento</option>
                    <option value="Alcool">Álcool</option>
                    <option value="Limpeza">Limpeza</option>
                    <option value="Cosméticos">Cosméticos</option>
                    <option value="Outros">Outros</option>
                </select>
                
            </div>
            <div class="col-12 my-2 col-md-12">
                <input type="hidden" name="" id="vendedor" value="123456">
                <label for="" style="font-size: 10px;">Nome do produto</label>
                <input type="text" name="" id="prod" placeholder="Insira o nome" class="form-control">
            </div>
            <div class="col-12 my-2 col-md-12">
                <button id="upload" class="btn rounded-pill w-100 btn-outline-success">Salvar Produto</button>
            </div>
        </div>
    </div>
</div>



<div class="position-fixed pop_minus r-0 l-0 t-0 b-0" style="top: 0; bottom: 0; left: 0; right: 0; z-index: 10000; background: #ff5353a9; display: grid; place-content: center;">
    <div class="bg-white p-3 mx-auto rounded-3 shadow w-50">
        <span class="text-danger fechar_prod_minus" style="float: right; cursor: pointer;">Fechar</span>
        <h4 class="text-danger">Remover Produto</h4>
        <div class="row">
            <div class="col-12 my-2 col-md-12">
                <select name="" id="qual" class="form-control">
                    
                <?php
                
                    $get_p22 = "SELECT * FROM produtos WHERE quem = 'admin' AND loja_ref = '$ref'";
                    $con_p22 = $conexao->query($get_p22);
                    $linh = mysqli_num_rows($con_p22);
                    while($dad = mysqli_fetch_array($con_p22)){

                    ?>
                        <option value="<?=$dad['ref']?>"><?=$dad['produto']?></option>

                    <?php
                                        }
                    ?>

                </select>
            </div>
            <div class="col-12 my-2 col-md-12">
                <div class="row">
                    <div class="col-6 col-md-6">
                        <label for="" style="font-size: 10px;">Quantidade</label>
                        <input type="number" name="" id="" placeholder="00" class="form-control">
                    </div>
                    <div class="col-6 col-md-6">
                        <label for="" style="font-size: 10px;">Produtos em stock</label><br>
                        <span style="font-size: 25px; margin-top: 1rem;font-weight: bold"><?=$linh?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 my-2 col-md-12">
                <button class="btn btn-outline-warning w-100 rounded-pill">Remover</button>
            </div>
            <div class="col-12 my-2 col-md-12">
                <button class="btn rounded-pill w-100 btn-outline-danger">Eliminar do Stock</button>
            </div>
        </div>
    </div>
</div>


<body>
    <div class="nav bg-warning  px-4 py-3">
        <div class="container">
            <div class="d-flex wrap justify-content-between">
                <div class=" d-flex ">
                    <div class="my-auto justify-content-between position-relative d-flex">
                       
                        

                        <img src="../img/banner_p.png" alt="" class="navbar-brand logo ">

                        <!--Começo do menu onde tem login e criar conta-->
                        <div class="position-absolute the_menu shadow-lg rounded-3 bg-light py-4 px-3 "
                            style="top: 3.5rem; z-index: 10; width: 20rem;">
                            <h3 class="text-danger">Comece por criar uma conta</h3>
                            <span>Abra uma conta e complete sua lista de compras</span><br>
                            <br>
                            <button class="btn btn-outline-warning rounded-5 w-100">Fazer Login</button>
                            <button class="btn mt-3 create rounded-5 w-100">Criar Conta</button>
                        </div>
                    </div>
                </div>

                
                <div style="top: .1%; right: 9%" class="my-2 my-lg-0 my-md-0 my-xl-0 my-sm-0 d-flex ">

                       
                        <img src="../img/pub2.png" height="50em" width="50em" style="border: 3px solid white" class="rounded-circle" alt="">

                </div>
            </div>


        </div>
        <!--Fechamenoto do container dentro da nav-->
    </div>
    <!--Fechamento do cabeçalho da navegação-->



    <br>


    <br>
    <br>


    <main class="container">
        

        <div class="bg-light p-2">
            <h4 class="font-thin text-danger">Área de avisos/mensagens Meu carrinho</h4>
        </div>

        <div class="bg-light my-3 rounded-3">
            <div class="w-100" style="height: 8rem; background: url(../img/pub2.png); background-size: cover;background-repeat: no-repeat; border-top-right-radius: 10px; border-top-left-radius: 10px;">
            </div>
            <div class="p-2">
            <h3 class="text-danger"><?=$lojaa?></h3>
            <span>Proprietário: <b class="text-danger"><?=$dono?></b></span><br>
            <span>Cod. Loja: <b class="text-danger"><?=$codigo?></b></span><br>
            <input type="hidden" name="" value="<?=$ref?>" id="loja">
            <span>Produtos na plataforma: <b class="text-danger"><?=$linh?></b></span>
            <br>
            <div class="d-flex justify-content-between flex-wrap">
                <span>Suporte:<a href=""> +244 <?=$telefone_loja?></a></span>
                <div class="d-flex">
                    <a href="./functions/logout.php">
                        
                        <button class="btn btn-outline-danger rounded-pill">Sair</button>
                    </a>
                <button class="btn btn-outline-danger rounded-pill">Encerrar conta</button>
                </div>
            </div>
            </div>
        </div>
        <br><br>

        <div class="row">
            <div class="col-12 my-2 col-md-4 text-center">
                <button class="btn w-100 btn-warning rounded-pill text-white add_mais">+ Produto</button>
            </div>
            <div class="col-12 my-2 col-md-4 text-center">
                <button class="btn w-100 btn-warning rounded-pill text-white add_menos">- Retirar Produto </button>
            </div>
            <div class="col-12 my-2 text-start col-md-4 text-center">
                <button class="btn w-100 btn-warning rounded-pill text-white anounce">Anunciar minha loja</button>
            </div>
        </div>
<br>
<hr>
<h2 class="font-thin">Facturação: 00.00 AOA</h2>
        <br>

        <div class="bg-light rounded-3 tb p-2">
            <div class="text-secondary">Seus produtos em Stock na <b>Meu Carrinho</b>
            <br><br>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Ref.</th>
                                <th>Produto</th>
                                <th>Uni.</th>
                                <th>Data</th>
                                <th>Preço (AOA)</th>
                                <th>Adicionado por</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $get_p = "SELECT * FROM produtos WHERE quem = 'admin' AND loja_ref = '$ref'";
                            $con_p = $conexao->query($get_p);

                            while($dados = mysqli_fetch_array($con_p)){

                            ?>


                            <tr>
                                <td><?=$dados['ref']?></td>
                                <td><?=$dados['produto']?></td>
                                <td><?=$dados['unidade']?></td>
                                <td><?=$dados['datas']?></td>
                                <td><?=$dados['preco'].".00 AOA"?></td>
                                <td class="d-flex position-relative justify-content-between"><b class="text-warning"><?=$dados['quem']?></b> <img src="./produtos_lojas/<?=$dados['foto_prod']?>" style="height: 2.5em; position: absolute; right: 0; top: 0; bottom: 0" alt=""></td>
                            </tr>


                            <?php

                            }

                            ?>
                        </tbody>
                    </table>
            
            </div>
        </div>

        <br><br>


    </main>

    <br><br><br>


    <footer class="bg-warning py-3">
        <br>
        <div class="container">
            <div class="footer row">
                <div class="col-12 col-md-3 col-lg-3 col-sm-6 col-xl-3">
                    <img src="../img/banner_p.png" height="40px" alt="">
                    <br><br>
                    <span class="text-danger">Luanda, Kilamba.</span>
                </div>
                <div class="col-12 col-md-3 col-lg-3 col-sm-6 col-xl-3">
                    <br>
                    <h5 class="text-white">Trabalhe connosco</h5>
                    <a href="../#" class="text-white text-decoration-none">Torne se um parceiro</a><br>
                    <a href="../#" class="text-white text-decoration-none">Torne se um Entregador</a><br>
                    <a href="../#" class="text-white text-decoration-none">Anuncios</a>
                </div>
                <div class="col-12 col-md-3 col-lg-3 col-sm-6 col-xl-3"> <br>
                    <h5 class="text-white">Empresa</h5>
                    <a href="../#" class="text-white text-decoration-none">Sobre nós</a><br>
                    <a href="../#" class="text-white text-decoration-none">FAQs</a><br>
                    <a href="../#" class="text-white text-decoration-none">Parceiro perto de sí</a>
                </div>
                <div class="col-12 col-md-3 col-lg-3 col-sm-6 col-xl-3"> <br>
                    <h5 class="text-white">Ajuda e Suporte</h5>
                    <a href="../tel:244946445629" class="text-white text-decoration-none">+244 946 445 629</a><br>
                    <a href="../#" class="text-white text-decoration-none">Contacte nos</a><br>
                    <a href="../#" class="text-white text-decoration-none">Anuncios</a>
                </div>
            </div><!-- Termino da parte dos conteudos do footer e dados da emoresa -->
            <br><br><br>
            <div class="foot-2 d-flex justify-content-between">
                <div class="copyright font-lighter text-white">2022 Meu Carrinho, Ltda &middot; <a href="../#"
                        class="text-decoration-none text-white " style="text-decoration: underline ;">Termos e
                        condições</a></div>
                <div class="mideas gap-2 d-flex">
                    <svg fill="white" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 320 512">
                        <path
                            d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                    </svg>

                    <svg fill="white" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512">
                        <path
                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                    </svg>

                    <svg fill="white" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512">
                        <path
                            d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" />
                    </svg>

                </div>
            </div>
        </div>
        <br>
    </footer>
    <script>
        

        $(".add_mais").click(function () {
            $(".pop_add").css({
                'transform':'translateX(0)',
                'transition':'.5s',
            });
        });
        $(".fechar_prod").click(function () {
            $(".pop_add").css({
                'transform':'translateX(-1900px)',
                'transition':'.5s',
            });
        });


        $(".add_menos").click(function () {
            $(".pop_minus").css({
                'transform':'translateX(0)',
                'transition':'.5s',
            });
        });
        $(".fechar_prod_minus").click(function () {
            $(".pop_minus").css({
                'transform':'translateX(-1900px)',
                'transition':'.5s',
            });
        });


        setInterval(() => {
            
        $("table").load(" table");
        }, 1500);

        

        $('#upload').click( function() {
                var file_data = $('#pic').prop('files')[0];
                var vend = $('#vendedor').val();
                var qnt = $('#qnt').val();
                var preco = $('#preco').val();
                var prod = $('#prod').val();

            if (file_data == null) {
                $(".profile").fadeOut();
                Swal.fire(
                    'Sem foto',
                    'Por favor selecione uma foto!',
                    'warning'
                );
            } else {

                var file_data = $('#pic').prop('files')[0];
                var vend = $('#vendedor').val();
                var qnt = $('#qnt').val();
                var preco = $('#preco').val();
                var prod = $('#prod').val();
                var loja = $('#loja').val();
                var cat = $('#cat').val();
                var form_data = new FormData();
                form_data.append('file', file_data);
                form_data.append('vend', vend);
                form_data.append('qnt', qnt);
                form_data.append('preco', preco);
                form_data.append('prod', prod);
                form_data.append('cat', cat);
                form_data.append('loja_ref', loja);

                $.ajax({
                    url: './functions/upload.php', // <-- point to server-side PHP script 
                    dataType: 'text', // <-- what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function(php_script_response) {
                        Swal.fire(
                            'Alterado',
                            php_script_response,
                            'success'
                        ); // <-- display response from the PHP script, if any

                        
            $(".pop_add").css({
                'transform':'translateX(-1900px)',
                'transition':'.5s',
            });
                    }
                });
            }

        });

    </script>
</body>

</html>