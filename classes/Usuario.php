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

        public static function userExists($user){
            $sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.usuarios` WHERE user = ?");
            $sql->execute(array($user));
            if($sql->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        }

        public static function cadastrarUsuario($user,$senha,$nome,$imagem,$cargo){
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.usuarios` VALUES (null,?,?,?,?,?)");
            $sql->execute(array($user, $senha, $nome, $imagem, $cargo));
        }
    }

?>