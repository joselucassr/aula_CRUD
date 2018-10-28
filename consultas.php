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
                    include_once 'banco_de_dados/read.php';
                ?>
            </tbody>
        </table>
        <div class="row col-12 text-center">
            <?php
            if (isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                session_unset();
            }
            ?>
        </div>
    </div>

<?php include_once 'includes/footer.inc.php'?>
