<?php

    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Painel::deleteFile($imagem);
        Painel::deletarRegistro('tb_site.categorias',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'gerenciar-categorias');
    }else if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_site.categorias',$_GET['order'],$_GET['id']);
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;

    $categorias = Painel::selectAll('tb_site.categorias', ($paginaAtual - 1) * $porPagina, $porPagina);
?>
<div class="main-container">
    <h3><i class="fa fa-id-card-o"></i> Slides Cadastrados</h3>
    <div class="table-wraper">
    <table>
        <tr>
            <td>Nome</td>
            <td>Editar</td>
            <td>Deletar</td>
            <td>#</td>
            <td>#</td>
        </tr>
        <?php
            foreach($categorias as $key => $value){
        ?>
        <tr>
            <td><?php echo $value['nome']; ?></td>
            <td><a class="btn-table btn-edit" href="<?php echo INCLUDE_PATH_PAINEL; ?>editar-categoria?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i> Editar</a></td>
            <td><a actionBtn="delete" class="btn-table btn-delete" href="<?php echo INCLUDE_PATH_PAINEL; ?>gerenciar-categorias?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Deletar</a></td>
            <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL; ?>gerenciar-categorias?order=up&id=<?php echo $value['id']; ?>"><i class="fa fa-angle-up"></i></a></td>
            <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL; ?>gerenciar-categorias?order=down&id=<?php echo $value['id']; ?>"><i class="fa fa-angle-down"></i></a></td>
        </tr>
        <?php } ?>
    </table>

    <div class="paginacao">
        <?php
            $totalPaginas = ceil(count(Painel::selectAll('tb_site.categorias')) / $porPagina);
            for($i = 1; $i < $totalPaginas; $i++){
                if($i == $paginaAtual){
                    echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'gerenciar-categorias?pagina='.$i.'">'.$i.'</a>';
                }else{
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'gerenciar-categorias?pagina='.$i.'">'.$i.'</a>';
                }
            }
        ?>
        <!-- <a class="page-selected" href="">1</a>
        <a href="">2</a>
        <a href="">3</a> -->
    </div><!--paginacao-->

    </div><!--table-wraper-->
</div>