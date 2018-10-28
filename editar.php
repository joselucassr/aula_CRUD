<?php
session_start();
include_once 'includes/header.inc.php';
include_once 'includes/menu.inc.php';
?>

    <div class="row col-12 mx-auto">
        <h5 class="col-12 mx-auto font-weight-light text-center" style="padding: 50px 0 5px 0; font-size: 40px;">Edição de Registros</h5>
        <hr style="height: 1px; background-color:#555; margin-top: 20px; margin-bottom: 20px; width: 100%;">
    </div>

    <?php
        include_once 'banco_de_dados/conexao.php';
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $_SESSION['id'] = $id;
        $querySelect = $link -> query("select * from tb_clientes where id='$id'");

        while ($registros = $querySelect -> fetch_assoc()){
            $nome = $registros['nome'];
            $email = $registros['email'];
            $telefone = $registros['telefone'];
        }
    ?>

    <!-- Formulário de Cadastro -->

        <form action="banco_de_dados/update.php" method="post">
            <!-- Campo Nome -->
            <div class="form-row col-12">
                <div class="form-group col-md-6 mx-auto" style="padding-top: 20px;">
                    <label for="nome" class="navbar-brand">Nome do Cliente</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $nome;?>" maxlength="40" required autofocus class="form-control">
                </div>
            </div>

            <!-- Campo Email -->
            <div class="form-row col-12">
                <div class="form-group col-md-6 mx-auto" style="padding-top: 20px;">
                    <label for="email" class="navbar-brand">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $email;?>" maxlength="50" required class="form-control">
                </div>
            </div>

            <!-- Campo Telefone -->
            <div class="form-row col-12">
                <div class="form-group col-md-6 mx-auto" style="padding-top: 20px;">
                    <label for="telefone" class="navbar-brand">Telefone</label>
                    <input type="tel" name="telefone" id="telefone" value="<?php echo $telefone;?>" maxlength="15" required class="form-control">
                </div>
            </div>

            <!-- Botão -->
            <div class="row col-6 mx-auto">
                <div class="form-group col-3 mx-auto text-left" style="padding-top: 20px;">
                    <input type="submit" value="Alterar" class="btn btn-primary">
                </div>
                <div class="form-group col-3 mx-auto text-left" style="padding-top: 20px;">
                    <a href="consultas.php" class="btn btn-danger mx-auto">Cancelar</a>
                </div>
            </div>
        </form>

<?php include_once 'includes/footer.inc.php'?>
