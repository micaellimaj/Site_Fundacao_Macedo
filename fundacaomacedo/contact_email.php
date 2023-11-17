<?php

$dbHost = 'Localhost'
$dbUsername = 'root'
$dbPassword = '';
$dbName = 'clientes';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName)

if($conexao->connect_erro)
{
    echo "Erro";
}
else
{
    echo "Conexão efetuada com sucesso";
}

?>