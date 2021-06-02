<?php

//iniciar a sessao com o database

session_start();
$conectar = mysql_connect('localhost', 'root', '');
$banco    = mysql_select_db('livraria', $conectar);

// se clicou no botao gravar

if (isset($_POST['bt_cadastrar'])) {
    $codcategoria  = $_POST['codcategoria'];
    $descricao     = $_POST['descricao'];
    $codprateleira = $_POST['codprateleira'];
    
    
    
    //comando mysql para gravar
    $sql       = "insert into categoria(codcategoria,descricao,codprateleira)
             values ('$codcategoria','$descricao','$codprateleira')";
    $resultado = mysql_query($sql);
    
    if ($resultado == 1) {
?>
           <script>
                alert("Cadastro efetuado com sucesso.");
                location.href="categoria.html";
            </script>
            <?php
    } else {
?>
           <script>
                alert("Erro... N�o foi possivel cadastrar. ");
                location.href="categoria.html";
            </script>
            <?php
    }
}

if (isset($_POST['bt_excluir'])) // se clicou no botao excluir
    {
    $codcategoria  = $_POST['codcategoria'];
    $descricao     = $_POST['descricao'];
    $codprateleira = $_POST['codprateleira'];
    
    
    
    //comando mysql para deletar
    $sql       = "delete from categoria where codcategoria = '$codcategoria'";
    $resultado = mysql_query($sql);
    
    
    
    if ($resultado == 1) {
?>
           <script>
                alert("Exclusao efetuada com sucesso.");
                location.href="categoria.html";
            </script>
            <?php
    } else {
?>
           <script>
                alert("Erro... N�o foi possivel excluir. ");
                location.href="categoria.html";
            </script>
            <?php
    }
}
if (isset($_POST['bt_alterar'])) // se clicou no botao alterar
    {
    $codcategoria  = $_POST['codcategoria'];
    $descricao     = $_POST['descricao'];
    $codprateleira = $_POST['codprateleira'];
    
    
    
    //comando mysql para alterar
    $sql       = "update categoria set descricao = '$descricao',
                                   codprateleira = '$codprateleira'
             where codcategoria = '$codcategoria'";
    $resultado = mysql_query($sql);
    
    
    
    if ($resultado == 1) {
?>
           <script>
                alert("Alteracao efetuada com sucesso.");
                location.href="categoria.html";
            </script>
            <?php
    } else {
?>
           <script>
                alert("Erro... N�o foi possivel alterar. ");
                location.href="categoria.html";
            </script>
            <?php
    }
}
if (isset($_POST['bt_pesquisar'])) // se clicou no botao pesquisar
    {
    //comando mysql para pesquisar
    
    
    
    $sql = "SELECT * FROM categoria";
    $resultado = mysql_query($sql) or die(mysql_error());
    
    
    
    while ($linha = mysql_fetch_array($resultado)) {
        echo "Codigo categoria    : " . $linha[0] . "<br>";
        echo "Descricao : " . $linha[1] . "<br>";
        echo "Codigo prateleira: " . $linha[2] . "<br><br>";
    }
}