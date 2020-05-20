<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Cliente</title>
    <nav class="nav-wrapper">
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
     <nav class="lighten-4">
        <div class="col s12">
            <a href="cliente.php" class="breadcrumb black-text">Cadastrar Cidade</a>
            <a href="altera_cidade.php" class="breadcrumb white-text">Alterar cidade</a>
        </div>
    </nav>


    <div id="conteudo" class="container">
        <h2 class="text-center">Alterar Cidade</h2>


        <?php
        include_once './conexao.php';
        include_once './funcoes_cidade.php';
        
        
    
       
       imprimeFormularioAlteraCidade();
       
        ?>
        

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select').formSelect();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>





