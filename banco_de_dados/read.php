<?php

include_once 'conexao.php';

$querySelect = $link -> query('select * from tb_clientes');

while ($registros = $querySelect -> fetch_assoc()){
    $id       = $registros['id'];
    $nome     = $registros['nome'];
    $email    = $registros['email'];
    $telefone = $registros['telefone'];

    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$nome</td>";
    echo "<td>$email</td>";
    echo "<td>$telefone</td>";
    echo "<td><a href='editar.php?id=$id'><i class=\"far fa-edit\"></i></a> </td>";
    echo "<td><a href='confirmacao.php?id=$id'><i class='far fa-trash-alt text-danger'></i></a> </td>";
    echo "</tr>";
}