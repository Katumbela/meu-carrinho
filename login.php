<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Meu Carrinho</title>
    <link rel="shortcut icon" href="img/logo.jpeg" type="image/x-icon">
    <script src="jquery.js"></script>
    <meta http-equiv="refresh" content="">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js.map"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="owl/dist/owl.carousel.js"></script>
<link rel="stylesheet" href="owl/dist/assets/owl.carousel.css">
<link rel="stylesheet" href="owl/dist/assets/owl.theme.default.css">
</head>
<style>
    
    .bg-warning{
        background: #FFBF53!important;
    }
    body{
        overflow-x: hidden;
    }
    .text-sm{
        font-size: 12px;
    }
    .text-xs{
        font-size: 10px;
    }
    @media (min-width: 700px) {
        .w-lg{
            width: 50%;
        }
    }
    @media (max-width: 600px) {
        .w-50{
            width: 100%!important;
        }
    }
    label{
        font-size: 12px;
    }
</style>
<body >
    <br>
    <div class="container text-dark" >
        <a style="text-decoration: none"  href="./index.php">&Leftarrow; Voltar</a>
    </div>


<form action="./func_files/auth_login.php" method="post">
    <input type="hidden" name="token" value="<?=sha1("Meu Carrinho LTDA")?>"  >

    <center class="my-auto">
        <div class="container">
         

            <br><br>
           
           

            <div class="w-lg bg-light shadow rounded-3 pb-3">
            <center  class=" ">
                    <div class="bg-warning shadow rounded-3 py-2 "><img src="img/banner_p.png" height="40em" alt="">
                <div class="container"><hr class="text-danger"></div>
                    <h2 class="text-danger">Fazer Login</h2></div>
                </center>
                <br>
                <div class="container px-2 py-3 mb-2">
                <div class="text-start text-secondary">
                    <label for="">Email ou telefone</label>
                    <input type="text" name="tel" placeholder="john_doe@email.com" id="" class="form-control">
                </div>
                <br>
                <div class="text-start text-secondary">
                    <label for="">Sua senha</label>
                    <input type="password" name="senha" placeholder="******" id="" class="form-control">
                </div>
                <br>
               <button type="submit" class="btn btn-outline-warning w-100">Entrar</button>
               <br>
               <br>
               <?php

                if(isset($_GET['query'])){
                    $query = base64_decode($_GET['query']);
                    if($query == "erro"){
                        ?>

                        <div class="alert w-75 p-0 alert-danger" style="display: grid; place-content: center; padding: 0!important">
                            <p style="font-size: 12px">Email ou senha incorrectos, <a href="forgot_datas.php">esqueceu sua senha</a>?</p>
                        </div>

                        <?php
                    }
                    else{
                        echo "";
                    }
                }
                else{
                    echo "";
                }

                ?>
                </div>
                
            </div>
        </div>
    </center>
    </form>
    
    <br>
    <br><br><br><br>
    <br><br><br>
    <center>
        <label for="" class="text-secondary">&copy; 2022 &middot; Meu Carrinho, Ltda</label>
    </center>
</body>
</html>