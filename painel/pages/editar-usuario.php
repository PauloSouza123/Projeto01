<div class="main-container">
    <h3><i class="fa fa-pencil"></i> Editar Usuário</h3>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            $nome = $_POST['nome'];
            $password = $_POST['password'];
            $imagem = $_FILES['imagem'];
            $imagem_atual = $_POST['imagem_atual'];
            $usuario = new Usuario;

            if($imagem['name'] != ''){
                if(Painel::imagemValida($imagem)){
                    Painel::deleteFile($imagem_atual);
                    $imagem = Painel::uploadFile($imagem);
                    if($usuario->atualizaUsuario($nome,$password,$imagem,$_SESSION['user'])){
                        $_SESSION['img'] = $imagem;
                        Painel::alert('sucesso','Atualizado com sucesso junto com a imagem!');
                    }else{
                        Painel::alert('erro','Erro ao atualizar junto com a imagem!');
                    }
                }else{
                    Painel::alert('erro','O formato da imagem não é válido!');
                }
            }else{
                $imagem = $imagem_atual;
                if($usuario->atualizaUsuario($nome,$password,$imagem,$_SESSION['user'])){
                    Painel::alert('sucesso','Atualizado com sucesso!');
                }else{
                    Painel::alert('erro','Erro ao atualizar!');
                }
            }
        }
    ?>
        <div class="form-editar-usuario-single">
            <input type="text" name="nome" value="<?php echo $_SESSION['nome']; ?>" required/>
            <input type="password" name="password" value="<?php echo $_SESSION['password']; ?>" required/>
            <input type="file" name="imagem" />
            <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']; ?>"/>
            <input type="submit" name="acao" value="Atualizar"/>
        </div>
    </form>
</div>