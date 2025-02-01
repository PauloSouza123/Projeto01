<?php

    class Usuario
    {
        public function atualizaUsuario($nome, $password, $imagem){
            $sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET nome = ?, password = ?, img = ? WHERE user = ?");
            if($sql->execute(array($nome,$password,$imagem,$_SESSION['user']))){
                return true;
            }else{
                return false;
            }
        }
    }

?>