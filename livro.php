<?php

//iniciar a sessao com o database

session_start();
$conectar = mysqli_connect('localhost', 'root', '');
$banco    = mysqli_select_db($conectar, 'livraria');

// se clicou no botao gravar

if (isset($_POST['bt_cadastrar'])) {
    $codigo       = $_POST['codigo'];
    $isbn         = $_POST['isbn'];
    $titulo       = $_POST['titulo'];
    $ano          = $_POST['ano'];
    $nrpaginas    = $_POST['nrpaginas'];
    $edicao       = $_POST['edicao'];
    $idioma       = $_POST['idioma'];
    $codeditora   = $_POST['codeditora'];
    $codautor     = $_POST['codautor'];
    $codcategoria = $_POST['codcategoria'];
    $foto         = $_FILES['foto'];
    $error        = 0;
    
    if (!empty($foto['name'])) {
        // Largura maxima em pixels
        $largura = 2000;
        // Altura maxima em pixels
        $altura  = 2000;
        // Tamanho maximo do arquivo em bytes
        $tamanho = 15000;
        
        // Verifica se o arquivo nao e uma imagem (extensoes)
        if (!preg_match("/^image\/(jpg|jpeg|png|gif|bmp)$/", $foto['type'])) {
            $error[1] = "NAO é uma imagem...";
        }
        
        // capturar as dimensoes da imagem
        $dimensoes = getimagesize($foto['tmp_name']);
        
        // Verifica se a largura da imagem maior que a largura permitida
        if ($dimensoes[0] > $largura) {
            $error[2] = "A largura da imagem nÃ£o deve ultrapassar 200 pixels";
        }
        
        // Verifica se a altura da imagem  maior que a altura permitida
        if ($dimensoes[1] > $altura) {
            $error[3] = "Altura da imagem nÃ£o deve ultrapassar 200 pixels";
        }
        
        // Verifica se o tamanho da imagem maior que o tamanho permitido
        if ($foto['size'] > $tamanho) {
            $error[4] = "A imagem deve ter no mÃ¡ximo 5000 bytes";
        }
        
        // Se nao houver nenhum erro
        if ($error == 0) {
            // Pega extensao da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto['name'], $ext);
            
            // Gera um nome unico para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
            
            // Caminho de onde armazena a imagem
            $caminho_imagem = "fotos2/" . $nome_imagem;
            
            // Faz o upload da imagem para seu respectivo caminho
            move_uploaded_file($foto['tmp_name'], $caminho_imagem);
            
            
            $query = "INSERT INTO livro (codlivro, ISBN, titulo, ano, nrpaginas, edicao, idioma, codeditora, codautor, codcategoria, foto)
             VALUES ('$codigo','$isbn','$titulo','$ano','$nrpaginas','$edicao','$idioma','$codeditora','$codautor','$codcategoria','$caminho_imagem')";
            
            $insert = mysqli_query($conectar, $query) or die(' Erro na query:' . $query . ' ' . mysqli_error($conectar));
            
            
            if ($insert) {
                echo "<script language='javascript' type='text/javascript'>
            alert('Livro cadastrado com sucesso!');
            window.location.href='livro.html'</script>";
            } else {
                echo "<script language='javascript' type='text/javascript'>
            alert('Nao foi possivel cadastrar este livro!');
            window.location.href='livro.html'</script>";
            }
        }
    }
    
}

if (isset($_POST['bt_excluir'])) // se clicou no botao excluir
    {
    $codigo       = $_POST['codigo'];
    $isbn         = $_POST['isbn'];
    $titulo       = $_POST['titulo'];
    $ano          = $_POST['ano'];
    $nrpaginas    = $_POST['nrpaginas'];
    $edicao       = $_POST['edicao'];
    $idioma       = $_POST['idioma'];
    $codeditora   = $_POST['codeditora'];
    $codautor     = $_POST['codautor'];
    $codcategoria = $_POST['codcategoria'];
    $foto         = $_FILES['foto'];
    
    
    
    
    
    //comando mysql para deletar
    $sql       = "delete from livro where codlivro = '$codigo'";
    $resultado = mysqli_query($conectar, $sql);
    
    
    
    if ($resultado == 1) {
?>
           <script>
                alert("Exclusao efetuada com sucesso.");
                location.href="livro.html";
            </script>
            <?php
    } else {
?>
           <script>
                alert("Erro... N�o foi possivel excluir. ");
                location.href="livro.html";
            </script>
            <?php
    }
}


if (isset($_POST['bt_alterar'])) // se clicou no botao alterar
    {
    $codigo       = $_POST['codigo'];
    $isbn         = $_POST['isbn'];
    $titulo       = $_POST['titulo'];
    $ano          = $_POST['ano'];
    $nrpaginas    = $_POST['nrpaginas'];
    $edicao       = $_POST['edicao'];
    $idioma       = $_POST['idioma'];
    $codeditora   = $_POST['codeditora'];
    $codautor     = $_POST['codautor'];
    $codcategoria = $_POST['codcategoria'];
    $foto         = $_FILES['foto'];
    
    
    
    //comando mysql para alterar
    $sql = "update livro set isbn = '$isbn',
                                   titulo = '$titulo',
                                   ano = '$ano',
                                   nrpaginas = '$nrpaginas',
                                   edicao = '$edicao',
                                   idioma = '$idioma',
                                   codeditora = '$codeditora',
                                   codautor = '$codautor',
                                   codcategoria = '$codcategoria',
                                   foto = '$foto'
             where codlivro = '$codigo'";
    $resultado = mysqli_query($conectar, $sql) or die(' Erro na query:' . $sql . ' ' . mysqli_error($conectar));
    
    
    
    if ($resultado == 1) {
?>
           <script>
                alert("Alteracao efetuada com sucesso.");
                location.href="livro.html";
            </script>
            <?php
    } else {
?>
           <script>
                alert("Erro... Nao foi possivel alterar. ");
                location.href="livro.html";
            </script>
            <?php
    }
    
}

if (isset($_POST['bt_pesquisar'])) // se clicou no botao pesquisar
    {
    //comando mysql para pesquisar
    
    $sql    = ("SELECT * FROM livro");
    $select = mysqli_query($conectar, $sql);
    
    
    
    while ($livro = mysqli_fetch_object($select)) {
        echo "<b>Livros :</b>" . "</td></tr>";
        echo "<table><tr><td>Cod Livro: " . $livro->codlivro . " </td></tr>";
        echo "<tr><td>ISBN : " . $livro->ISBN . " </td></tr>";
        echo "<tr><td>Titulo: " . $livro->titulo . " </td></tr>";
        echo "<tr><td>Nr Paginas: " . $livro->nrpaginas . " </td></tr>";
        echo "<tr><td>Edicao: " . $livro->edicao . " </td></tr>";
        echo "<tr><td>Idioma: " . $livro->idioma . " </td></tr>";
        echo "<tr><td>Cod Editora: " . $livro->codeditora . " </td></tr>";
        echo "<tr><td>Cod Autor: " . $livro->codautor . " </td></tr>";
        echo "<tr><td>Cod Categoria: " . $livro->codcategoria . " </td></tr>";
        echo "<tr><td><img src='" . $livro->foto . "' width=100 height=100/></td></tr>";
        echo "</tr></table></div>";
    }
}

?>