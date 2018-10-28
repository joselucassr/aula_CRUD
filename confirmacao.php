<?php include_once 'includes/header.inc.php'?>
<?php include_once 'includes/menu.inc.php'?>
<?php session_start()?>

<div class="row col-12 mx-auto">
    <h5 class="col-12 mx-auto font-weight-light text-center" style="padding: 50px 0 5px 0; font-size: 40px;">Consultas</h5>
    <hr style="height: 1px; background-color:#555; margin-top: 20px; margin-bottom: 20px; width: 100%;">

    <table class="table table-borderless  table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Consultas</th>
        </tr>
        </thead>
        <tbody>
            <?php

            include_once 'banco_de_dados/conexao.php';
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $_SESSION['id'] = $id;
            $querySelect = $link -> query("select * from tb_clientes where id='$id'");

            while ($registros = $querySelect -> fetch_assoc()){
                $nome = $registros['nome'];
                $email = $registros['email'];
                $telefone = $registros['telefone'];

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$nome</td>";
                echo "<td>$email</td>";
                echo "<td>$telefone</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="row col-12 text-center">
        <h2 class="col-12 text-center" style="margin-top: 15px">Você deseja mesmo APAGAR esta conta?</h2>
    </div>
    <div class="row col-12 mx-auto">
        <div class="form-group col-4 mx-auto text-center" style="padding-top: 20px;">
            <a href='banco_de_dados/delete.php?id=<?php echo $id;?>' class="btn btn-danger mx-auto">SIM</a>
        </div>
        <div class="form-group col-4 mx-auto text-center" style="padding-top: 20px;">
            <a href="consultas.php" class="btn btn-success mx-auto">NÃO</a>
        </div>
    </div>
</div>

<?php include_once 'includes/footer.inc.php'?>
