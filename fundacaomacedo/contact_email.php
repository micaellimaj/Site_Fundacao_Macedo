<?php

if (!isset($_REQUEST['safety_key'])) {
    die();
}
// Email do Administrador.

$para = "fundacaomacedope@gmail.com"; // insira o endereço de e-mail aqui.

// Obtendo valores da URL.

$nome_usuario = $_POST['user_name'];

$email_usuario = $_POST['user_email'];

$assunto_email = $_POST['email_subject'];

$mensagem_email = $_POST['email_message'];

$template = '<div style="padding:50px; color:#2C2C2C;">Olá ' . $nome_usuario . ',<br/>'
        . '<br/>Obrigado...! Por entrar em contato conosco.<br/><br/>'
        . 'Nome:' . $nome_usuario . '<br/>'
        . 'E-mail:' . $email_usuario . '<br/>'
        . 'Mensagem:' . $mensagem_email . '<br/><br/>'
        . 'Esta é uma confirmação de contato.'
        . '<br/>'
        . 'Entraremos em contato assim que possível.</div>';

$mensagem = "<div style=\"background-color:#FAFAFA; color:#2C2C2C;\">" . $template . "</div>";

$cabecalhos = 'MIME-Version: 1.0' . "\r\n";

$cabecalhos .= 'Content-type: text/html; charset=utf-8; charset=iso-8859-1' . "\r\n";

$cabecalhos .= 'De:' . $email_usuario . "\r\n"; // E-mail do remetente

mail($para, $assunto_email, $mensagem, $cabecalhos, '');

$dados = array(
    'status' => 1,
    'msg' => "Recebemos sua consulta. Entraremos em contato em breve."
);

echo json_encode($dados);