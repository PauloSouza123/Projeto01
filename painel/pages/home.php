<?php 
    $usuariosOnline = Painel::listarUsuariosOnline();

    $pegarVisitasTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
    $pegarVisitasTotais->execute();
    $pegarVisitasTotais = $pegarVisitasTotais->rowCount(); // rowCount serve para pegar somente o número

    $pegarVisitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia = ?");
    $pegarVisitasHoje->execute(array(date('Y-m-d')));
    $pegarVisitasHoje = $pegarVisitasHoje->rowCount();
?>

<!-- Comentário de teste -->
 <!-- Mais um comentário de teste -->


<div class="main-container">
        <h3><i class="fa fa-house"></i> Painel de Controle - Danki Code</h3>

<div class="box-main-all">

            <div class="box-main-single">
                <h2>Usuários Online</h2>
                <p><?php echo count($usuariosOnline); ?></p>
            </div>

            <div class="box-main-single">
                <h2>Total de Visitas</h2>
                <p><?php echo $pegarVisitasTotais; ?></p>
            </div>

            <div class="box-main-single">
                <h2>Visitas Hoje</h2>
                <p><?php echo $pegarVisitasHoje; ?></p>
            </div>
</div>
</div>

<div class="main-container">
    <h3><i class="fa-solid fa-earth-americas"></i> Usuários Online</h3>
    <div class="table-responsive">
<?php foreach($usuariosOnline as $key => $value){ ?>
        <div class="row">
            <div class="col">
                <h3>IP</h3>
            </div>
            <div class="col">
                <h3>Última Ação</h3>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <span><?php echo $value['ip']; ?></span>
            </div>
            <div class="col">
                <span><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao'])); ?></span>
            </div>
        </div>
<?php } ?>
    </div>
</div>