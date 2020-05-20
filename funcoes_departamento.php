
<?php

function listar() {
    $sSql = 'SELECT * '
            . 'FROM MERCADO.TBDEPARTAMENTO';
    $oResultado = pg_query(getConexao(), $sSql);
    $aTabela = [];

    while ($aLinha = pg_fetch_assoc($oResultado)) {
        array_push($aTabela, $aLinha);
    }
    return $aTabela;
}

function cadastrar($sDescricao){
    $sSql = "INSERT INTO MERCADO.TBDEPARTAMENTO (dptdescricao) VALUES ('$sDescricao')";
    pg_query(getConexao(), $sSql);
}
function alterar($iDptcodigo, $sDescricao) {
    $sSql = "UPDATE MERCADO.TBDEPARTAMENTO SET dptdescricao='$sDescricao' WHERE dptcodigo=$iDptcodigo";
    pg_query(getConexao(), $sSql);
}
function deletar($iChave){
    $sSql = 'DELETE FROM MERCADO.TBDEPARTAMENTO WHERE dptcodigo ='.$iChave. ';';
    pg_query(getConexao(), $sSql);
    
}

function imprimeTabela($aTabela) {
    if (empty($aTabela)){
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
        echo '<td>' . $aLinha['dptcodigo'] . '</td>';
        echo '<td>' . $aLinha['dptdescricao'] . '</td>';
        echo '<td><a href="departamento.php?acao=deletar&registro='.$aLinha['dptcodigo'].'"><button class="btn waves-effect waves-light red darken-4 " type="submit" name="action">Deletar
          </button></a></td>';
        echo '<td><a href="altera_departamento.php?acao=alterar&registro=' .$aLinha['dptcodigo'] . "&descricao=" . $aLinha['dptdescricao'] . '"> <button class="btn waves-effect waves-light blue darken-1" type="submit" name="action">Alterar
          </button></a></td>';
        echo '</tr>';
    }
    echo '</table>';
}
function imprimeFormularioCadastro() {
    echo '
          <form method="POST" action="departamento.php?acao=cadastrar">
          <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" name="descricao" placeholder="" id="" required>
          </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar</button>
          </form>
          </br>';
    
}
function imprimeFormularioAlteraDepartamento() {
    echo '
          <form method="POST" action="departamento.php?acao=alterar">
          <input type="hidden" class="form-control" name="dptcodigo" value="'.$_GET['registro'].'">
          <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" name="descricao" placeholder="" value="'.$_GET['descricao'].'" required>
          </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Alterar</button>
          </form>
          </br>';
    
}









