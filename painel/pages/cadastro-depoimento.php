<div class="main-container">
    <h3><i class="fa fa-pencil"></i> Adicionar Depoimento</h3>

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
            <input type="text" name="nome" placeholder="Nome" />
            <textarea name="depoimento" placeholder="Depoimento"></textarea>
            <input formato="data" type="text" name="data" placeholder="Data"/>
            <input type="hidden" name="nome_tabela" value="tb_site.depoimentos"/>
            <input type="submit" name="acao" value="Cadastrar"/>
        </div>
    </form>
</div>