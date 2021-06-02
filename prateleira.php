<?php

//iniciar a sessao com o database

session_start();
$conectar = mysql_connect('localhost', 'root', '');
$banco    = mysql_select_db('livraria', $conectar);

// se clicou no botao gravar

if (isset($_POST['bt_cadastrar'])) {
    $codigo     = $_POST['codigo'];
    $descricao  = $_POST['descricao'];
    $capacidade = $_POST['capacidade'];
    
    
    
    //comando mysql para gravar
    $sql       = "insert into prateleira(codprateleira,descricao,capacidade)
             values ('$codigo','$descricao','$capacidade')";
    $resultado = mysql_query($sql);
    
    if ($resultado == 1) {
?>
           <script>
                alert("Cadastro efetuado com sucesso.");
                location.href="prateleira.html";
            </script>
            <?php
    } else {
?>
           <script>
                alert("Erro... N�o foi possivel cadastrar. ");
                location.href="prateleira.html";
            </script>
            <?php
    }
}

if (isset($_POST['bt_excluir'])) // se clicou no bot�o excluir
    {
    $codigo     = $_POST['codigo'];
    $descricao  = $_POST['descricao'];
    $capacidade = $_POST['capacidade'];
    
    
    
    //comando mysql para gravar
    $sql       = "delete from prateleira where codprateleira = '$codigo'";
    $resultado = mysql_query($sql);
    
    
    
    if ($resultado == 1) {
?>
           <script>
                alert("Exclusao efetuada com sucesso.");
                location.href="prateleira.html";
            </script>
            <?php
    } else {
?>
           <script>
                alert("Erro... N�o foi possivel excluir. ");
                location.href="prateleira.html";
            </script>
            <?php
    }
}
if (isset($_POST['bt_alterar'])) // se clicou no bot�o alterar
    {
    $codigo     = $_POST['codigo'];
    $descricao  = $_POST['descricao'];
    $capacidade = $_POST['capacidade'];
    
    
    
    //comando mysql para alterar
    $sql       = "update prateleira set descricao = '$descricao',
                                   capacidade = '$capacidade'
             where codprateleira = '$codigo'";
    $resultado = mysql_query($sql);
    
    
    
    if ($resultado == 1) {
?>
           <script>
                alert("Alteracao efetuada com sucesso.");
                location.href="prateleira.html";
            </script>
            <?php
    } else {
?>
           <script>
                alert("Erro... N�o foi possivel alterar. ");
                location.href="prateleira.html";
            </script>
            <?php
    }
}
if (isset($_POST['bt_pesquisar'])) // se clicou no bot�o pesquisar
    {
    //comando mysql para pesquisar
    
    
    
    $sql = "SELECT * FROM prateleira";
    $resultado = mysql_query($sql) or die(mysql_error());
    
    
    
    while ($linha = mysql_fetch_array($resultado)) {
        echo "Codigo    : " . $linha[0] . "<br>";
        echo "Descricao : " . $linha[1] . "<br>";
        echo "Capacidade: " . $linha[2] . "<br><br>";
    }
}