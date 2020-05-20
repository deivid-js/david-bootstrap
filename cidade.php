<?php
    include_once './funcoes_autenticar.php';

    verificaLogin();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Cidade</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Página Inicial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categoria.php">Categoria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="departamento.php">Departamento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cidade.php">Cidade</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cliente.php">Cliente</a>
                    </li>
                </ul>
            </div>
        </nav>
        <nav class="white">
        <div class="col s12">
            <a href="cidade.php" class="breadcrumb white-text">Cadastrar cidade</a>
        </div>
    </nav>
        <div class="container">
            <h2 class="text-center">Cidade</h2>
            <?php
            require_once 'conexao.php';
            require_once 'funcoes_cidade.php';

            if (isset($_GET['acao'])) {
                switch ($_GET['acao']) {
                    case 'cadastrar':
                        cadastrar($_POST['nome']);
                        break;
                    case 'alterar':
                        alterar($_POST['cidcodigo'], $_POST['cidade']);
                        break;
                    case 'deletar':
                        deletar($_GET['registro']);
                        break;
                    default:
                        break;
                }
            }
            imprimeFormularioCadastro();
            imprimeTabela(listar());
            ?>

        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('select').formSelect();
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>





