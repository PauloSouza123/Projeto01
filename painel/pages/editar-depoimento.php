<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $depoimento = Painel::select('tb_site.depoimentos','id = ?',array($id));
    }else{
        Painel::alert('erro','Erro ao editar depoimento!');
        die();
    }
?>
<div class="main-container">
    <h3><i class="fa fa-pencil"></i> Editar Depoimento</h3>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            if(Painel::update($_POST)){
                Painel::alert('sucesso','Depoimento cadastrado com sucesso!');
                $depoimento = Painel::select('tb_site.depoimentos','id = ?',array($id));
            }else{
                Painel::alert('erro','Erro ao cadastrar depoimento!');
            }

        }
    ?>
        <div class="form-editar-depoimento-single">
            <input type="text" name="nome" value="<?php echo $depoimento['nome']; ?>" />
            <textarea name="depoimento"><?php echo $depoimento['depoimento']; ?></textarea>
            <input formato="data" type="text" name="data" value="<?php echo $depoimento['data']; ?>"/>
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <input type="hidden" name="nome_tabela" value="tb_site.depoimentos"/>
            <input type="submit" name="acao" value="Cadastrar"/>
        </div>
    </form>
</div>