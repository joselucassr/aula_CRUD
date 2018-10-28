<?php
session_start();
include_once 'conexao.php';

$nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);

$querySelect = $link -> query("select email from tb_clientes");
$arrayEmails = [];

while ($emails = $querySelect -> fetch_assoc()){
    $emailsExistentes = $emails['email'];
    array_push($arrayEmails, $emailsExistentes);
}

if (in_array($email, $arrayEmails)){
    $_SESSION['msg'] = '<p class="mx-auto text-center text-danger">Já existe um cliente cadastrado com esse email D:</p>';
    header("Location: ../");
} else {
    $queryInsert  = $link -> query("insert into tb_clientes values (default, '$nome', '$email', '$telefone')");
    $affectedRows = mysqli_affected_rows($link);

    if ($affectedRows > 0){
        $_SESSION['msg'] = '<p class="mx-auto text-center text-success">Cadastro efetuado com sucesso!</p>';
        header("Location: ../");
    }
}