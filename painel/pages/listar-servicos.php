<?php

    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Painel::deletarRegistro('tb_site.servicos',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-servicos');
    }else if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_site.servicos',$_GET['order'],$_GET['id']);
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;

    $servicos = Painel::selectAll('tb_site.servicos', ($paginaAtual - 1) * $porPagina, $porPagina);
?>
<div class="main-container">
    <h3><i class="fa fa-id-card-o"></i> Serviços Cadastrados</h3>
    <div class="table-wraper">
    <table>
        <tr>
            <td>Serviço</td>
            <td>Editar</td>
            <td>Deletar</td>
            <td>#</td>
            <td>#</td>
        </tr>
        <?php
            foreach($servicos as $key => $value){
        ?>
        <tr>
            <td><?php echo $value['servicos']; ?></td>
            <td><a class="btn-table btn-edit" href="<?php echo INCLUDE_PATH_PAINEL; ?>editar-servico?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i> Editar</a></td>
            <td><a actionBtn="delete" class="btn-table btn-delete" href="<?php echo INCLUDE_PATH_PAINEL; ?>listar-depoimentos?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Deletar</a></td>
            <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL; ?>listar-servicos?order=up&id=<?php echo $value['id']; ?>"><i class="fa fa-angle-up"></i></a></td>
            <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL; ?>listar-servicos?order=down&id=<?php echo $value['id']; ?>"><i class="fa fa-angle-down"></i></a></td>
        </tr>
        <?php } ?>
    </table>

    <div class="paginacao">
        <?php
            $totalPaginas = ceil(count(Painel::selectAll('tb_site.servicos')) / $porPagina);
            for($i = 1; $i < $totalPaginas; $i++){
                if($i == $paginaAtual){
                    echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$i.'">'.$i.'</a>';
                }else{
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$i.'">'.$i.'</a>';
                }
            }
        ?>
        <!-- <a class="page-selected" href="">1</a>
        <a href="">2</a>
        <a href="">3</a> -->
    </div><!--paginacao-->

    </div><!--table-wraper-->
</div>