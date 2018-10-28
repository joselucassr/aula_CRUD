<?php
session_start();
include_once 'conexao.php';

// Faz o request dos inputs dados no cadastro

$nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);

// Inicia uma query para buscar os valores
$querySelect = $link -> query("select email from tb_clientes");

// Cria uma lista que vai receber os emails já existentes
$arrayEmails = [];

// Puxa os emails existentes do db e armazena eles na lista $arrayEmails
while ($emails = $querySelect -> fetch_assoc()){
    $emailsExistentes = $emails['email'];
    array_push($arrayEmails, $emailsExistentes);
}

// Se for achado que existe um email igual no banco de dados o seguinte é executado
if (in_array($email, $arrayEmails)){
    $_SESSION['msg'] = '<p class="mx-auto text-center text-danger">Já existe um cliente cadastrado com esse email D:</p>';
    header("Location: ../");
} else { // Se não, o proximo é
    $queryInsert  = $link -> query("insert into tb_clientes values (default, '$nome', '$email', '$telefone')");
    $affectedRows = mysqli_affected_rows($link);

    if ($affectedRows > 0){
        $_SESSION['msg'] = '<p class="mx-auto text-center text-success">Cadastro efetuado com sucesso!</p>';
        header("Location: ../");
    }
}