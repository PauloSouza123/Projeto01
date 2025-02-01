<?php
    if(isset($_GET['loggout'])){
        Painel::loggout();
    }
?>
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

    <div class="menu">
        <div class="box-menu">
            <?php if(isset($_SESSION['img'])){ ?>
                <div class="imagem-usuario">
                    <img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $_SESSION['img']; ?>" />
                </div>
            <?php }else{ ?>
                <div class="avatar-usuario">
                    <i class="fa fa-user"></i>
                </div>
            <?php } ?>
        </div>
        <div class="texto-menu">
                <p><?php echo $_SESSION['nome']; ?></p>
                <p><?php echo setarCargo($_SESSION['cargo']); ?></p>
        </div>

        <div class="menu-links">
            <div class="menu-links-secoes">
                <h3>Cadastro</h3>
                <a href="<?php echo INCLUDE_PATH_PAINEL; ?>cadastro-depoimento">Cadastrar Depoimento</a>
                <a href="">Cadastrar Serviço</a>
            </div>

            <div class="menu-links-secoes">
                <h3>Gestão</h3>
                <a href="">Listar Depoimento</a>
                <a href="">Listar Serviço</a>
            </div>
            <div class="menu-links-secoes">
                <h3>Administração do Painel</h3>
                <a href="<?php echo INCLUDE_PATH_PAINEL; ?>editar-usuario">Editar Usuário</a>
                <a href="">Adicionar Usuário</a>
            </div>

            <div class="menu-links-secoes">
                <h3>Configurações Gerais</h3>
                <a href="">Editar</a>
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <header>
        <div class="center">
            <div class="btn-menu">
                <i class="fa fa-bars"></i>
            </div>
            <div class="loggout">
                <a href="<?php echo INCLUDE_PATH_PAINEL; ?>home"><i class="fa-solid fa-house"></i> Home</a>
                <a href="<?php INCLUDE_PATH_PAINEL; ?>?loggout"><i class="fa-solid fa-right-from-bracket"></i> Sair</a>
            </div><!--loggout-->
            <div class="clear"></div>
        </div>
    </header>


    <div class="main right">

        <?php Painel::carregarPagina(); ?>


    </div>
    <div class="clear"></div>

 
    <script src="https://kit.fontawesome.com/8f8c768746.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL; ?>js/menu.js"></script>
 </body>
 </html>