
<?php

function listar() {
    $sSql = 'SELECT * FROM MERCADO.TBCIDADE';
    $oResultado = pg_query(getConexao(), $sSql);
    $aTabela = [];

    while ($aLinha = pg_fetch_assoc($oResultado)) {
        array_push($aTabela, $aLinha);
    }
    return $aTabela;
}

function cadastrar($sNome) {
    $sSql = "INSERT INTO MERCADO.TBCIDADE (cidnome) VALUES ('$sNome')";
    pg_query(getConexao(), $sSql);
}

function alterar($iCidcodigo, $sNome) {
    $sSql = "UPDATE MERCADO.TBCIDADE SET cidnome='$sNome' WHERE cidcodigo=$iCidcodigo";
    pg_query(getConexao(), $sSql);
}

function deletar($iChave) {
    $sSql = 'DELETE FROM MERCADO.TBCIDADE WHERE cidcodigo =' . $iChave . ';';
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
    echo '<th>Ações</th>';
    echo '</tr>';
    foreach ($aTabela as $aLinha) {
        echo '<tr>';
        echo '<td>' . $aLinha['cidcodigo'] . '</td>';
        echo '<td>' . $aLinha['cidnome'] . '</td>';
        echo '<td><a href="cidade.php?acao=deletar&registro=' . $aLinha['cidcodigo'] . '"><button class="btn waves-effect waves-light red darken-4 " type="submit" name="action">Deletar
          </button></a></td>';
        echo '<td><a href="altera_cidade.php?acao=alterar&registro=' .$aLinha['cidcodigo'] . "&cidade=" . $aLinha['cidnome'] . '"> <button class="btn waves-effect waves-light blue darken-1" type="submit" name="action">Alterar
          </button></a></td>';
        echo '</tr>';
    }
    echo '</table>';
}

function imprimeFormularioCadastro() {
    echo '
          <form method="POST" action="cidade.php?acao=cadastrar">
          <div class="form-group">
            <label for="nome">Cadastrar cidade</label>
            <input type="text" class="form-control" name="nome" placeholder="" id="" required>
          </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar</button>
          </form>
          </br>';
}

function imprimeFormularioAlteraCidade() {
    echo '
          <form method="POST" action="cidade.php?acao=alterar">
          <input type="hidden" class="form-control" name="cidcodigo" value="'.$_GET['registro'].'">
          <div class="form-group">
            <label for="nome">Alterar cidade</label>
            <input type="text" class="form-control" name="cidade" placeholder="" value="'.$_GET['cidade'].'" required>
          </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Alterar</button>
          </form>
          </br>';
}
