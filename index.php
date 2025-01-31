<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    include('config.php'); 

?>
<?php Site::updateUsuarioOnline(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="X-UA-Compatible" content="IE-Edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH; ?>estilo/style.css" rel="stylesheet"/>
    <link href="#" rel="shortcut icon"/>
    <title>Projeto 01</title>
</head>
<body>

<?php
            if (isset($_POST['acao']) && $_POST['identificador'] == 'form_home') {
                if ($_POST['email'] != '') {
                    $email = $_POST['email'];
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        try {
                            $mail = new Email('vps.dankicode.com', 'testes@dankicode.com', 'gui123456', 'Guilherme');
                            $mail->addAdress('contato@dankicode.com', 'Guilherme');
                            $info = array('assunto' => 'Um novo e-mail cadastrado no site', 'corpo' => $email);
                            $mail->formatarEmail($info);
            
                            if ($mail->enviarEmail()) {
                                echo '<script>alert("Enviado com sucesso!");</script>';
                            } else {
                                echo '<script>alert("Algo deu errado no envio do e-mail!");</script>';
                            }
                        } catch (Exception $e) {
                            error_log('Exceção ao enviar o e-mail: ' . $e->getMessage());
                            echo '<script>alert("Erro no envio do e-mail.");</script>';
                        }
                    } else {
                        echo '<script>alert("Não é um e-mail válido!");</script>';
                    }
                } else {
                    echo '<script>alert("Campos vazios não são permitidos!");</script>';
                }
            }else if(isset($_POST['acao']) && $_POST['identificador'] == 'form_contato'){
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
                $mensagem = $_POST['mensagem'];
                $assunto = 'Nova mensagem do site!';
                $corpo = '';
                foreach($_POST as $key => $value){
                    $corpo.=ucfirst($key).": ".$value;
                    $corpo.="<hr/>";
                }
                $info = array('assunto'=>$assunto,'corpo'=>$corpo);
                $mail = new Email('vps.dankicode.com', 'testes@dankicode.com', 'gui123456', 'Guilherme');
                $mail->addAdress('contato@dankicode.com', 'Guilherme');
                $mail->formatarEmail($info);
                if ($mail->enviarEmail()) {
                    echo '<script>alert("Enviado com sucesso!");</script>';
                } else {
                    echo '<script>alert("Algo deu errado no envio do e-mail!");</script>';
                }
            }
        ?>

    <?php
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';

        switch($url){
            case 'depoimentos':
                echo '<target target="depoimentos" />';
                break;

            case 'servicos':
                echo '<target target="servicos" />';
                break;
        }

    ?>

    <header class="w100">
        <div class="center">
            <div class="logo left">
                <h2><a href="<?php INCLUDE_PATH; ?>">Danki.Code</a></h2>
            </div>
            <nav class="desktop right">
                <ul>
                    <li><a href="<?php INCLUDE_PATH; ?>home">Home</a></li>
                    <li><a href="<?php INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
                    <li><a href="<?php INCLUDE_PATH; ?>servicos">Serviços</a></li>
                    <li><a realtime="contato" href="<?php INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav>
            <nav class="mobile right">
                <div class="mobile-icon">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <ul>
                    <li><a href="<?php INCLUDE_PATH; ?>home">Home</a></li>
                    <li><a href="<?php INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
                    <li><a href="<?php INCLUDE_PATH; ?>servicos">Serviços</a></li>
                    <li><a reltime="contato" href="<?php INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div>
    </header>

    <div class="container-principal">
    <?php

        if(file_exists('pages/'.$url.'.php')){
            include('pages/'.$url.'.php');
        }else{
            if($url != 'depoimentos' && $url != 'servicos'){
                $pagina404 = true; 
                include('pages/404.php');
            }else{
                include('pages/home.php');
            }
        }
    ?>
    </div><!--container-principal-->



    <footer class="w100 <?php if(isset($pagina404) && $pagina404 == true) echo 'fixed';  ?>" >
        <h2>Todos os direitos reservados</h2>
    </footer>
    




    <script src="https://kit.fontawesome.com/8f8c768746.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>

    <?php if($url == 'home' || $url == ''){ ?>
        <script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>    
    <?php } ?>

    <script src="<?php echo INCLUDE_PATH; ?>js/exemplo.js"></script>

</body>
</html>