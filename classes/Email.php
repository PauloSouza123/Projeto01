<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {
    private $mailer;

    public function __construct($host, $username, $senha, $name) {
        $this->mailer = new PHPMailer(true);

        try {
            $this->mailer->isSMTP();
            $this->mailer->Host = $host;
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = $username;
            $this->mailer->Password = $senha;
            $this->mailer->SMTPSecure = 'ssl';
            $this->mailer->Port = 465;
            $this->mailer->CharSet = 'UTF-8';

            $this->mailer->setFrom($username, $name);
            $this->mailer->isHTML(true);
        } catch (Exception $e) {
            error_log("Erro ao configurar PHPMailer: " . $e->getMessage());
        }
    }

    public function addAdress($email, $nome) {
        $this->mailer->addAddress($email, $nome);
    }

    public function formatarEmail($info) {
        $this->mailer->Subject = $info['assunto'];
        $this->mailer->Body = $info['corpo'];
        $this->mailer->AltBody = strip_tags($info['corpo']);
    }

    public function enviarEmail() {
        try {
            return $this->mailer->send();
        } catch (Exception $e) {
            error_log("Erro ao enviar e-mail: " . $e->getMessage());
            return true;
        }
    }
}
