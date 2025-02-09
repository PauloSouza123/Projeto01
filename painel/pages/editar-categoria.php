<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $categoria = Painel::select('tb_site.categorias','id=?',array($id));
    }else{
        Painel::alert('erro','Você precisa passar o parâmetro ID!');
        die();
    }
?>
<div class="main-container">
    <h3><i class="fa fa-pencil"></i> Editar Slide</h3>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            $slug = Painel::generateSlug($_POST['nome']);
            $arr = array_merge($_POST,array('slug'=>$slug));
            $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE nome = ? AND id != ?");
            $verificar->execute(array($_POST['nome'], $id));
            $info = $verificar->fetch();
            if($verificar->rowCount() == 1 && $_POST['nome'] == $info['nome']){
                Painel::alert('erro','Já existe uma categoria com este nome!');
            }else{
                if(Painel::update($arr)){
                    Painel::alert('sucesso','A categoria foi editada com sucesso!');
                    $categoria = Painel::select('tb_site.categorias','id=?',array($id));
                }else{
                    Painel::alert('erro','Campo vázios não serão tolerados!');
                }
            }
        }
    ?>
        <div class="form-editar-usuario-single">
            <input type="text" name="nome" value="<?php echo $categoria['nome']; ?>" />
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <input type="hidden" name="nome_tabela" value="tb_site.categorias"/>
            <input type="submit" name="acao" value="Atualizar"/>
        </div>
    </form>
</div>