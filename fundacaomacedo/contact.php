<?php

    if(isset($_POST['submit']))
    {

    include_once(contact_email.php);

    $nome = $_POST['user_name'];
    $telefone = $_POST['user_phone'];
    $data_nasc = $_POST['user_birthdate'];
    $cidade = $_POST['user_city'];

    $result = mysqli_query($conexao, "INSERT INTO clientes(nome,cidade,telefone,data_nasc)
    VALUES ('$nome','$telefone','$data_nasc','$cidade')");

    }

?>