<div class="main-container">
    <h3><i class="fa fa-pencil"></i> Adicionar Serviço</h3>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            if(Painel::insert($_POST)){
                Painel::alert('sucesso','Depoimento cadastrado com sucesso!');
            }else{
                Painel::alert('erro','Erro ao cadastrar depoimento!');
            }

        }
    ?>
        <div class="form-editar-depoimento-single">
            <textarea name="servico"></textarea>
            <input type="hidden" name="nome_tabela" value="tb_site.servicos"/>
            <input type="submit" name="acao" value="Cadastrar"/>
        </div>
    </form>
</div>