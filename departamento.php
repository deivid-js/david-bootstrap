<?php
    include_once './funcoes_autenticar.php';

    verificaLogin();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    <div class="container">
        <h2 class="text-center">Departamento</h2>
        <?php
        require_once 'conexao.php';
        require_once 'funcoes_departamento.php';

        if (isset($_GET['acao'])) {
            switch ($_GET['acao']) {
                case 'cadastrar':
                    cadastrar($_POST['descricao']);
                    break;
                case 'alterar':
                    alterar($_POST['dptcodigo'],$_POST['descricao']);
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
</body>
</html>

<?php



