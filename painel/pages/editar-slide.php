<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $slide = Painel::select('tb_site.slides','id=?',array($id));
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
            $nome = $_POST['nome'];
            $imagem = $_FILES['imagem'];
            $imagem_atual = $_POST['imagem_atual'];

            if($imagem['name'] != ''){
                if(Painel::imagemValida($imagem)){
                    Painel::deleteFile($imagem_atual);
                    $imagem = Painel::uploadFile($imagem);
                    $arr = ['nome'=>$nome,'slide'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site.slides'];
                    Painel::update($arr);
                    $slide = Painel::select('tb_site.slides','id=?',array($id));
                    Painel::alert('sucesso','O slide foi editado com sucesso, junto com a imagem!');
                }else{
                    Painel::alert('erro','O formato da imagem não é válido!');
                }
            }else{
                $imagem = $imagem_atual;
                $arr = ['nome'=>$nome,'slide'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site.slides'];
                Painel::update($arr);
                Painel::alert('sucesso','O slide foi editado com sucesso!');
            }
        }
    ?>
        <div class="form-editar-usuario-single">
            <input type="text" name="nome" value="<?php echo $slide['nome']; ?>" required/>
            <input type="file" name="imagem" />
            <input type="hidden" name="imagem_atual" value="<?php echo $slide['slide']; ?>"/>
            <input type="submit" name="acao" value="Atualizar"/>
        </div>
    </form>
</div>