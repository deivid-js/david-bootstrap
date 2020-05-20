<?php

function listar() {
    $sSql = 'SELECT * '
            . 'FROM MERCADO.TBCATEGORIA';
    $oResultado = pg_query(getConexao(), $sSql);
    $aTabela = [];

    while ($aLinha = pg_fetch_assoc($oResultado)) {
        array_push($aTabela, $aLinha);
    }
    return $aTabela;
}

function cadastrar($sDescricao) {
    $sSql = "INSERT INTO mercado.tbcategoria (catdescricao) VALUES ('$sDescricao')";
    pg_query(getConexao(), $sSql);
}

function alterar($iCatcodigo, $sNome) {
    $sSql = "UPDATE MERCADO.TBCATEGORIA SET catdescricao='$sNome' WHERE catcodigo=$iCatcodigo";
    pg_query(getConexao(), $sSql);
}

function deletar($iChave) {
    $sSql = 'DELETE FROM mercado.tbcategoria WHERE catcodigo =' . $iChave . ';';
    pg_query(getConexao(), $sSql);
}

function imprimeTabela($aTabela) {
    if (empty($aTabela)) {
        echo 'Não há registros a serem exibidos';
    }
    echo '<table class="table table-bordered">';
    echo '<tr>';
    echo '<th>Código</th>';
    echo '<th>Nome</th>';
    echo '<th>Ações</th>';
    echo '</tr>';
    foreach ($aTabela as $aLinha) {
        echo '<tr>';
        echo '<td>' . $aLinha['catcodigo'] . '</td>';
        echo '<td>' . $aLinha['catdescricao'] . '</td>';
        echo '<td><a href="categoria.php?acao=deletar&registro=' . $aLinha['catcodigo'] . '"><button class="btn waves-effect waves-light red darken-4 " type="submit" name="action">Deletar
          </button></a></td>';
        echo '<td><a href="altera_categoria.php?acao=alterar&registro=' .$aLinha['catcodigo'] . "&descricao=" . $aLinha['catdescricao'] . '"> <button class="btn waves-effect waves-light blue darken-1" type="submit" name="action">Alterar
          </button></a></td>';
        echo '</tr>';
    }
    echo '</table>';
}

function imprimeFormularioCadastro() {
    echo '
          <form method="POST" action="categoria.php?acao=cadastrar">
          <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" name="descricao" placeholder="" id="" required>
          </div>
           <button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar</button>
          </form>
          </br>';
}
function imprimeFormularioAlteraCategoria() {
    echo '
          <form method="POST" action="categoria.php?acao=alterar">
          <input type="hidden" class="form-control" name="catcodigo" value="'.$_GET['registro'].'">
          <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" name="descricao" placeholder="" value="'.$_GET['descricao'].'" required>
          </div>
           <button class="btn waves-effect waves-light" type="submit" name="action">Alterar</button>
          </form>
          </br>';
}
