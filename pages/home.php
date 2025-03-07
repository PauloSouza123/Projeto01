<section class="principal w100">
    <div style="background-image: url('<?php INCLUDE_PATH; ?>images/bg1.jpg')" class="principal-images"></div>
    <div style="background-image: url('<?php INCLUDE_PATH; ?>images/bg2.jpg')" class="principal-images"></div>
    <div style="background-image: url('<?php INCLUDE_PATH; ?>images/bg3.jpg')" class="principal-images"></div>
        <div class="center">
            <div class="overlay"></div>
            <div class="form-principal">
                <h2>Qual é o seu melhor e-mail?</h2>
                <form method="post">
                    <input type="email" name="email" required/>
                    <input type="hidden" name="identificador" value="form_home"/>
                    <input type="submit" name="acao" value="Enviar"/>
                </form>
            </div>
        </div>
            <div class="bullets">
                <!-- <span class="active-slide"></span>
                <span></span>
                <span></span> -->
            </div>
    </section>

    <section class="sobre-autor">
        <div class="center">
            <div class="descricao-autor w50 left">
                <h2><?php echo $infoSite['nome_autor']; ?></h2>
                <p><?php echo $infoSite['descricao']; ?></p>
                <p><?php echo $infoSite['descricao1']; ?></p>
            </div>
            <div class="image-autor w50 right">
                <img src="<?php INCLUDE_PATH; ?>images/girl.jpg"/>
            </div>
            <div class="clear"></div>
        </div>
    </section>

    <section class="especialidades w100">
        <div class="center">
            <h2>Especialidades</h2>
            <div class="box-especialidade w33 left">
                <h3><i class="<?php echo $infoSite['icone1']; ?>"></i></h3>
                <h4>CSS3</h4>
                <p><?php echo $infoSite['descricao1']; ?></p>
            </div>
            <div class="box-especialidade w33 left">
                <h3><i class="<?php echo $infoSite['icone2']; ?>"></i></h3>
                <h4>HTML5</h4>
                <p><?php echo $infoSite['descricao2']; ?></p>
            </div>
            <div class="box-especialidade w33 left">
                <h3><i class="<?php echo $infoSite['icone3']; ?>"></i></h3>
                <h4>JAVASCRIPT</h4>
                <p><?php echo $infoSite['descricao3']; ?></p>
            </div>
            <div class="clear"></div>
        </div>
    </section>

    <section class="extras w100">
        <div class="center">
        <div id="depoimentos" class="depoimentos w50 left">
        <h2>Depoimentos dos nossos clientes</h2>
        <?php 
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.depoimentos` ORDER BY order_id ASC LIMIT 3");
            $sql->execute();
            $depoimentos = $sql->fetchAll();
            foreach($depoimentos as $key => $value){
        ?>
            <div class="depoimentos-single">
                <p>"<?php echo $value['depoimento']; ?>"</p>
                <h4><?php echo $value['nome']; ?> - <?php echo $value['data']; ?></h4>
            </div>
        <?php } ?>
        </div>



            <div id="servicos" class="servicos w50 left">
                <div class="servicos-single">
                <h2>Nossos Serviços</h2>
                    <ul>
                        <?php
                            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.servicos` ORDER BY order_id ASC");
                            $sql->execute();
                            $servicos = $sql->fetchAll();
                            foreach($servicos as $key => $value){
                        ?>
                        <li><p><?php echo $value['servicos']; ?></p></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </section>