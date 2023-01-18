<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Meu Carri111nho</title>
    <link rel="shortcut icon" href="../img/logo.jpeg" type="image/x-icon">
    <script src="../jquery.js"></script>
    <meta http-equiv="refresh" content="">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.js.map"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../owl/dist/owl.carousel.js"></script>
<link rel="stylesheet" href="../owl/dist/assets/owl.carousel.css">
<link rel="stylesheet" href="../owl/dist/assets/owl.theme.default.css">
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

    label{
        font-size: 12px;
    }

</style>
<body >


<form action="./functions/auth_login.php" method="post">
    <input type="hidden" name="token" value="<?=sha1("Meu Carrinho LTDA")?>"  >

    <center class="my-auto">
        <div class="">
            <div class="bg-warning py-3">
                <center>
                    <img src="../img/banner_p.png" class="w-50" alt="">
                </center>
            </div>

            <br><br>

            <h2 class="text-danger">Entrar para sua conta - Parceiro </h2>

            <div class="w-lg container">
                <div class="text-start text-secondary">
                    <label for="">Código de acesso</label>
                    <input type="text" name="tel" placeholder="Codigo de acesso" id="" class="form-control">
                </div>
                <br>
                <div class="text-start text-secondary">
                    <label for="">Sua senha</label>
                    <input type="password" name="senha" placeholder="******" id="" class="form-control">
                </div>
                <br>
                <a href=".././home/"><button class="btn btn-outline-warning w-100">Entrar</button></a>
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