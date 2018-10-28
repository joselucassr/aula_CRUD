<?php session_start(); ?>
<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/menu.inc.php' ?>

        <!-- Formulário de Cadastro -->
        <div class="row col-12">
            <h5 class="mx-auto font-weight-light text-center" style="padding-top: 50px;">Cadastro de Clientes</h5>
        </div>

        <!-- Notificação do resultado -->
        <div class="row col-12 text-center">
            <?php
            if (isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                session_unset();
            }
            ?>
        </div>

        <form action="banco_de_dados/create.php" method="post">
            <!-- Campo Nome -->
            <div class="form-row col-12">
                <div class="form-group col-md-6 mx-auto" style="padding-top: 20px;">
                    <label for="nome" class="navbar-brand">Nome do Cliente</label>
                    <input type="text" name="nome" id="nome" maxlength="40" required autofocus class="form-control">
                </div>
            </div>

            <!-- Campo Email -->
            <div class="form-row col-12">
                <div class="form-group col-md-6 mx-auto" style="padding-top: 20px;">
                    <label for="email" class="navbar-brand">Email</label>
                    <input type="email" name="email" id="email" maxlength="50" required class="form-control">
                </div>
            </div>

            <!-- Campo Telefone -->
            <div class="form-row col-12">
                <div class="form-group col-md-6 mx-auto" style="padding-top: 20px;">
                    <label for="telefone" class="navbar-brand">Telefone</label>
                    <input type="tel" name="telefone" id="telefone" maxlength="15" required class="form-control">
                </div>
            </div>

            <!-- Botão -->
            <div class="row col-6 mx-auto">
                <div class="form-group col-3 mx-auto text-left" style="padding-top: 20px;">
                    <input type="submit" value="cadastrar" class="btn btn-primary">
                </div>
            </div>
        </form>
<?php include_once 'includes/footer.inc.php' ?>