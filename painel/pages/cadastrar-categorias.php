<div class="main-container">
    <h3><i class="fa fa-pencil"></i> Cadastrar Categoria</h3>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            $nome = $_POST['nome'];
            if($nome == ''){
                Painel::alert('erro','Campos vázios não são permitidos!');
            }else{
                    $slug = Painel::generateSlug($nome);
                    $arr = ['nome'=>$nome,'slug'=>$slug,'order_id'=>'0','nome_tabela'=>'tb_site.categorias'];
                    Painel::insert($arr);
                    Painel::alert('sucesso','Categoria cadastrada com sucesso!');
            }
        }
    ?>
        <div class="form-editar-usuario-single">
            <input type="text" name="nome" placeholder="Nome" />
            <input type="submit" name="acao" value="Cadastrar"/>
        </div>
    </form>
</div>