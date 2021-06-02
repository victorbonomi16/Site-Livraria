<?php

//iniciar a sessao com o database

session_start();
$conectar = mysql_connect('localhost', 'root', '');
$banco    = mysql_select_db('livraria', $conectar);

// se clicou no botao gravar

if (isset($_POST['bt_cadastrar'])) {
    $codigo   = $_POST['codigo'];
    $nome     = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $cidade   = $_POST['cidade'];
    $estado   = $_POST['estado'];
    $telefone = $_POST['telefone'];
    
    
    
    //comando mysql para gravar
    $sql       = "insert into editora(codeditora,nome,endereco,cidade,estado,telefone)
             values ('$codigo','$nome','$endereco','$cidade','$estado','$telefone')";
    $resultado = mysql_query($sql);
    
    if ($resultado == 1) {
?>
           <script>
                alert("Cadastro efetuado com sucesso.");
                location.href="editora.html";
            </script>
            <?php
    } else {
?>
           <script>
                alert("Erro... N�o foi possivel cadastrar. ");
                location.href="editora.html";
            </script>
            <?php
    }
}

if (isset($_POST['bt_excluir'])) // se clicou no botao excluir
    {
    $codigo   = $_POST['codigo'];
    $nome     = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $cidade   = $_POST['cidade'];
    $estado   = $_POST['estado'];
    $telefone = $_POST['telefone'];
    
    
    
    //comando mysql para deletar
    $sql       = "delete from editora where codeditora = '$codigo'";
    $resultado = mysql_query($sql);
    
    
    
    if ($resultado == 1) {
?>
           <script>
                alert("Exclusao efetuada com sucesso.");
                location.href="editora.html";
            </script>
            <?php
    } else {
?>
           <script>
                alert("Erro... Nao foi possivel excluir. ");
                location.href="editora.html";
            </script>
            <?php
    }
}
if (isset($_POST['bt_alterar'])) // se clicou no botao alterar
    {
    $codigo   = $_POST['codigo'];
    $nome     = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $cidade   = $_POST['cidade'];
    $estado   = $_POST['estado'];
    $telefone = $_POST['telefone'];
    
    
    
    //comando mysql para alterar
    $sql       = "update editora set nome = '$nome',
                                   endereco = '$endereco',
                                   cidade = '$cidade',
                                   estado = '$estado',
                                   telefone = '$telefone'
             where codeditora = '$codigo'";
    $resultado = mysql_query($sql);
    
    
    
    if ($resultado == 1) {
?>
           <script>
                alert("Alteracao efetuada com sucesso.");
                location.href="editora.html";
            </script>
            <?php
    } else {
?>
           <script>
                alert("Erro... Nao foi possivel alterar. ");
                location.href="editora.html";
            </script>
            <?php
    }
}
if (isset($_POST['bt_pesquisar'])) // se clicou no botao pesquisar
    {
    //comando mysql para pesquisar
    
    
    
    $sql = "SELECT * FROM editora";
    $resultado = mysql_query($sql) or die(mysql_error());
    
    
    
    while ($linha = mysql_fetch_array($resultado)) {
        echo "Codigo Editora    : " . $linha[0] . "<br>";
        echo "nome : " . $linha[1] . "<br>";
        echo "Endereco: " . $linha[2] . "<br>";
        echo "Cidade    : " . $linha[3] . "<br>";
        echo "Estado    : " . $linha[4] . "<br>";
        echo "Telefone    : " . $linha[5] . "<br><br>";
    }
}