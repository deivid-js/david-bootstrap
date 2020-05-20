
<?php

function listar() {
    $sSql = 'SELECT * '
            . 'FROM MERCADO.TBCLIENTE JOIN MERCADO.TBCIDADE USING (CIDCODIGO)';
    $oResultado = pg_query(getConexao(), $sSql);
    $aTabela = [];

    while ($aLinha = pg_fetch_assoc($oResultado)) {
        array_push($aTabela, $aLinha);
    }
    return $aTabela;
}

function cadastrar($sNome, $iCpf, $iCidade) {
    $sSql = "INSERT INTO MERCADO.TBCLIENTE (clinome,clicpf,cidcodigo) VALUES ('$sNome','$iCpf',$iCidade)";
    pg_query(getConexao(), $sSql);
}

function alterar($iClicodigo,$sNome, $iCpf, $iCidade ) {
    $sSql = "UPDATE MERCADO.TBCLIENTE SET clinome='$sNome',clicpf= '$iCpf',cidcodigo=$iCidade WHERE clicodigo=$iClicodigo";
    pg_query(getConexao(), $sSql);
}

function deletar($iChave) {
    $sSql = 'DELETE FROM MERCADO.TBCLIENTE WHERE clicodigo =' . $iChave . ';';
    pg_query(getConexao(), $sSql);
}

function imprimeTabela($aTabela) {
    if (empty($aTabela)) {
        echo 'Não há registro a serem exibidos';
    }
    echo '<table class="table table-bordered">';
    echo '<tr>';
    echo '<th>Código</th>';
    echo '<th>Nome</th>';
    echo '<th>CPF</th>';
    echo '<th>Cidade</th>';
    echo '<th>Cidade codigo</th>';
    echo '<th>Ações</th>';
    echo '</tr>';
    foreach ($aTabela as $aLinha) {
        echo '<tr>';
        echo '<td>' . $aLinha['clicodigo'] . '</td>';
        echo '<td>' . $aLinha['clinome'] . '</td>';
        echo '<td>' . $aLinha['clicpf'] . '</td>';
        echo '<td>' . $aLinha['cidnome'] . '</td>';
        echo '<td>' . $aLinha['cidcodigo'] . '</td>';
        echo '<td><a href="cliente.php?acao=deletar&registro=' . $aLinha['clicodigo'] . '"> <button class="btn waves-effect waves-light red darken-4 " type="submit" name="action">Deletar
          </button></a></td>';
        echo '<td><a href="altera_cliente.php?acao=alterar&registro=' . $aLinha['clicodigo'] . "&nome=" . $aLinha['clinome'] . "&cpf=" . $aLinha['clicpf'] . "&cidade=" . $aLinha['cidnome'] . '"> <button class="btn waves-effect waves-light blue darken-1" type="submit" name="action">Alterar
          </button></a></td>';
        echo '</tr>';
    }
    echo '</table>';
}

function imprimeFormularioCadastro() {
    echo '<form method="POST" action="cliente.php?acao=cadastrar">';
    echo '<div class="form-group">';
    echo '<label for="cpf">Nome</label>';
    echo '<input type="text" class="form-control" name="nome" placeholder="" id="" required>';
    echo '<label for="nome">CPF</label>';
    echo '<input type="text" class="form-control" name="cpf" placeholder="" id="" required>';
    echo '</div>';
    echo ' <div class="input-field">';
    echo ' <select name="cidade">';
    select();
    echo ' </select>';
    echo '</div>';
    echo '<button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar</button>';
    echo ' </form>';
    echo ' </br>';
}

function imprimeFormularioAlteraCliente() {
    echo '<form method="POST" action="cliente.php?acao=alterar">';
    echo '<input name="clicodigo" type="hidden" value="'. $_GET['registro'].'">';
    echo '<div class="form-group">';
    echo '<label for="cpf">Nome</label>';
    echo '<input type="text" class="form-control" name="nome" placeholder="" value="' . $_GET['nome'] . '"required>';
    echo '<label for="nome">CPF</label>';
    echo '<input type="text" class="form-control" name="cpf" placeholder="" value="' . $_GET['cpf'] . '" required>';
    echo '</div>';
    echo ' <div class="input-field">';
    echo ' <select name="cidade">';
    select();
    echo ' </select>';
    echo '</div>';
    echo '<button class="btn waves-effect waves-light" type="submit" name="action">Alterar</button>';
    echo ' </form>';
    echo ' </br>';
}

function select() {
    $sSql = 'SELECT *
               FROM MERCADO.TBCIDADE';
    $oResultado = pg_query(getConexao(), $sSql);
    $aTabela = [];

    while ($aLinha = pg_fetch_assoc($oResultado)) {
        $aTabela[] = $aLinha;
    }
    foreach ($aTabela as $aLinha) {
        echo '<option value="' . $aLinha['cidcodigo'] . '">' . $aLinha['cidnome'] . '</option>';
    }
}

