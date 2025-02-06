<div class="main-container">
    <h3><i class="fa fa-pencil"></i> Cadastrar Slide</h3>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            $nome = $_POST['nome'];
            $imagem = $_FILES['imagem'];
            if($nome == ''){
                Painel::alert('erro','Campos vázios não são permitidos!');
            }else{
                if(Painel::imagemValida($imagem) == false){
                    Painel::alert('erro','Selecione uma imagem válida!');
                }else{
                    $imagem = Painel::uploadFile($imagem);
                    $arr = ['nome'=>$nome,'slide'=>$imagem,'order_id'=>'0','nome_tabela'=>'tb_site.slides'];
                    Painel::insert($arr);
                    Painel::alert('sucesso','Slide cadastrado com sucesso!');
                }
            }
        }
    ?>
        <div class="form-editar-usuario-single">
            <input type="text" name="nome" placeholder="Nome" />
            <input type="file" name="imagem" />
            <input type="submit" name="acao" value="Cadastrar"/>
        </div>
    </form>
</div>