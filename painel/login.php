<!DOCTYPE html>
 <html lang="pt-br">
 <head>
    <meta charset="UTF-8">
    <meta name="X-UA-Compatible" content="IE-Edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css" rel="stylesheet"/>
    <link href="#" rel="shortcut icon"/>
    <title>Painel de Controle</title>
 </head>
 <body>

    <div class="box-login">
        <div class="box-login-wraper">
        <?php

            if(isset($_POST['acao'])){
                $user = $_POST['user'];
                $password = $_POST['password'];
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
                $sql->execute(array($user,$password));
                $info = $sql->fetch();
                if($sql->rowCount() == 1){
                    $_SESSION['login'] = true;
                    $_SESSION['user'] = $user;
                    $_SESSION['password'] = $password;
                    $_SESSION['nome'] = $info['nome'];
                    $_SESSION['img'] = $info['img'];
                    $_SESSION['cargo'] = $info['cargo'];
                    header('Location: '.INCLUDE_PATH_PAINEL);
                    die();
                }else{
                    echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário ou Senha Incorretos!</div>';
                }
            }

        ?>
            <h2>Efetue o Login:</h2>
            <form method="post">
                <input type="text" name="user" placeholder="Login" required/>
                <input type="password" name="password" placeholder="Senha" required/>
                <input type="submit" name="acao" value="Enviar"/>
            </form>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/8f8c768746.js" crossorigin="anonymous"></script>
 </body>
 </html>