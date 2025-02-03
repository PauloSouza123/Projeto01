<?php
    verificaPermissaoPagina(2);
?>
<div class="main-container">
    <h3><i class="fa fa-pencil"></i> Editar Usuário</h3>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            $nome = $_POST['nome'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $cargo = $_POST['cargo'];
            $imagem = $_FILES['imagem'];
            if($nome == ''){
                Painel::alert('erro','O campo Usuário está vázio!');
            }else if($login == ''){
                Painel::alert('erro','O campo login está vázio!');
            }else if($password == ''){
                Painel::alert('erro','O campo senha está vázio!');
            }else if($cargo == ''){
                Painel::alert('erro','Selecione um cargo!');
            }else if($imagem['name'] == ''){
                Painel::alert('erro','Selectione uma imagem!');
            }else{
                if($cargo >= $_SESSION['cargo']){
                    Painel::alert('erro','Selecione um cargo menor que o seu!');
                }else if(Painel::imagemValida($imagem) == false){
                    Painel::alert('erro','Selecione uma imagem válida!');
                }else if(Usuario::userExists($login)){
                    Painel::alert('erro','Usuário já existe!');
                }else{
                    $usuario = new Usuario();
                    $imagem = Painel::uploadFile($imagem);
                    Usuario::cadastrarUsuario($login, $password, $nome, $imagem, $cargo);
                    Painel::alert('sucesso','Usuário cadastrado com sucesso!');
                }
            }
        }
    ?>
        <div class="form-editar-usuario-single">
            <input type="text" name="nome" placeholder="Nome" />
            <input type="text" name="login" placeholder="Login" />
            <input type="password" name="password" placeholder="Senha" />
            <div class="select-cargos">
                <select name="cargo">
                    <label>Cargo:</label>
                    <?php
                        foreach(Painel::$cargos as $key => $value){
                            if($key < $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                    ?>
                </select>
            </div>
            <input type="file" name="imagem" />
            <input type="submit" name="acao" value="Cadastrar"/>
        </div>
    </form>
</div>