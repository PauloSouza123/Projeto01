<?php
    $site = Painel::select('tb_site.config',false);
?>
<div class="main-container">
    <h3><i class="fa fa-pencil"></i> Editar Serviço</h3>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            if(Painel::update($_POST,true)){
                Painel::alert('sucesso','Site editado com sucesso!');
                $serviço = Painel::select('tb_site.servicos',false);
            }else{
                Painel::alert('erro','Erro ao editar site!');
            }

        }
    ?>
        <div class="form-editar-depoimento-single">
            <label>Título do site</label>
            <input type="text" name="titulo" value="<?php echo $site['titulo']; ?>" />

            <label>Nome do autor:</label>
            <input type="text" name="nome_autor" value="<?php echo $site['nome_autor'] ?>" />
            <label>Descrição do autor:</label>
            <textarea name="descricao"><?php echo $site['descricao']; ?></textarea>

            <?php 
                for($i = 1; $i <= 3; $i++){
            ?>  
                <label>Ícone <?php echo $i; ?></label>
                <input type="text" name="icone<?php echo $i; ?>" value="<?php echo $site['icone'.$i]; ?>" />
                <label>Descrição <?php echo $i; ?></label>
                <textarea name="descricao<?php echo $i; ?>"><?php echo $site['descricao'.$i]; ?></textarea>
            <?php } ?>

            <input type="hidden" name="nome_tabela" value="tb_site.config" />
            <input type="submit" name="acao" value="Cadastrar" />
        </div>
    </form>
</div>