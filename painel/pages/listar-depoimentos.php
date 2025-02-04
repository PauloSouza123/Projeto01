<?php
    $depoimentos = Painel::selectAll('tb_site.depoimentos');
?>
<div class="main-container">
    <h3><i class="fa fa-id-card-o"></i> Depoimentos Cadastrados</h3>
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
            <td><a class="btn-table btn-edit" href=""><i class="fa fa-pencil"></i> Editar</a></td>
            <td><a class="btn-table btn-delete" href=""><i class="fa fa-times"></i> Deletar</a></td>
        </tr>
        <?php } ?>
    </table>
</div>