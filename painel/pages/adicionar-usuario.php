<?php
    verificaPermissaoPagina(2);
?>
<div class="main-container">
    <h3><i class="fa fa-pencil"></i> Editar Usuário</h3>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){

        }
    ?>
        <div class="form-editar-usuario-single">
            <input type="text" name="nome" placeholder="Nome" required/>
            <input type="text" name="login" placeholder="Login" required/>
            <input type="password" name="password" placeholder="Senha" required/>
            <input type="file" name="imagem" />
            <input type="submit" name="acao" value="Cadastrar"/>
        </div>
    </form>
</div>