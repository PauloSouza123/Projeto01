<?php

    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Painel::deletarRegistro('tb_site.depoimentos',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-depoimentos');
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;

    $depoimentos = Painel::selectAll('tb_site.depoimentos', ($paginaAtual - 1) * $porPagina, $porPagina);
?>
<div class="main-container">
    <h3><i class="fa fa-id-card-o"></i> Depoimentos Cadastrados</h3>
    <div class="table-wraper">
    <table>
        <tr>
            <td>Nome</td>
            <td>Data</td>
            <td>Editar</td>
            <td>Deletar</td>
        </tr>
        <?php
            foreach($depoimentos as $key => $value){
        ?>
        <tr>
            <td><?php echo $value['nome']; ?></td>
            <td><?php echo $value['data']; ?></td>
            <td><a class="btn-table btn-edit" href="<?php echo INCLUDE_PATH_PAINEL; ?>editar-depoimento?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i> Editar</a></td>
            <td><a actionBtn="delete" class="btn-table btn-delete" href="<?php echo INCLUDE_PATH_PAINEL; ?>listar-depoimentos?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Deletar</a></td>
        </tr>
        <?php } ?>
    </table>

    <div class="paginacao">
        <?php
            $totalPaginas = ceil(count(Painel::selectAll('tb_site.depoimentos')) / $porPagina);
            for($i = 1; $i < $totalPaginas; $i++){
                if($i == $paginaAtual){
                    echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
                }else{
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
                }
            }
        ?>
        <!-- <a class="page-selected" href="">1</a>
        <a href="">2</a>
        <a href="">3</a> -->
    </div><!--paginacao-->

    </div><!--table-wraper-->
</div>