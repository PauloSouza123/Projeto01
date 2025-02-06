<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $servicos = Painel::select('tb_site.servicos','id = ?',array($id));
    }else{
        Painel::alert('erro','Erro ao editar serviço!');
        die();
    }
?>
<div class="main-container">
    <h3><i class="fa fa-pencil"></i> Editar Serviço</h3>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            if(Painel::update($_POST)){
                Painel::alert('sucesso','Serviço cadastrado com sucesso!');
                $serviço = Painel::select('tb_site.servicos','id = ?',array($id));
            }else{
                Painel::alert('erro','Erro ao cadastrar serviço!');
            }

        }
    ?>
        <div class="form-editar-depoimento-single">
            <textarea name="servicos"><?php echo $servicos['servicos']; ?></textarea>
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <input type="hidden" name="nome_tabela" value="tb_site.servicos"/>
            <input type="submit" name="acao" value="Cadastrar"/>
        </div>
    </form>
</div>