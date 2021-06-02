<?php
//iniciar a sessao e conectar no servidor e database
session_start();
$conectar = mysqli_connect('localhost', 'root', '');
$banco    = mysqli_select_db($conectar, 'livraria');

//se clicou no botao gravar

if (isset($_POST['bt_gravar'])) {
    $codautor        = $_POST['codautor'];
    $nome            = $_POST['nome'];
    $nacionalidade   = $_POST['nacionalidade'];
    $ocupacao        = $_POST['ocupacao'];
    $data_nascimento = $_POST['data_nascimento'];
    //comando mysql para gravar
    $sql             = "insert into autor (codautor,nome,nacionalidade,ocupacao,datanascimento)
         values ('$codautor','$nome','$nacionalidade','$ocupacao','$data_nascimento')";
    //comando php para validar o insert
    $resultado       = mysqli_query($conectar, $sql);
    
    if ($resultado == 1) {
?>
 <script>
      alert("Cadastro efetuado com sucesso.");
      location.href="autor.html";
  </script>
  <?php
    } else {
?>
 <script>
      alert("Erro... Nao foi possivel cadastrar. ");
      location.href="autor.html";
  </script>
  <?php
    }
}
if (isset($_POST['bt_excluir'])) //se clicou no botao excluir
    {
    $codautor  = $_POST['codautor'];
    $sql       = "delete from autor where codautor like '$codautor';";
    $resultado = mysqli_query($conectar, $sql);
    
    if ($resultado == 1) {
?>
 <script>
      alert("Exclusao efetuada com sucesso.");
      location.href="autor.html";
  </script>
  <?php
    } else {
?>
 <script>
      alert("Erro... Nao foi possivel excluir. ");
      location.href="autor.html";
  </script>
  <?php
    }
}

if (isset($_POST['bt_pesquisar'])) {
    $sql       = "select * from autor";
    $resultado = mysqli_query($conectar, $sql);
    while ($linha = mysqli_fetch_array($resultado)) {
        echo "Codigo autor:     " . $linha[0] . "<br>";
        echo "Nome :            " . $linha[1] . "<br>";
        echo "Nacionalidade:    " . $linha[2] . "<br>";
        echo "Ocupaçao:         " . $linha[3] . "<br>";
        echo "Data nascimento:  " . $linha[4] . "<br>";
    }
}

if (isset($_POST['bt_alterar'])) // se clicou no botão alterar
    {
    $codautor        = $_POST['codautor'];
    $nome            = $_POST['nome'];
    $nacionalidade   = $_POST['nacionalidade'];
    $ocupacao        = $_POST['ocupacao'];
    $data_nascimento = $_POST['data_nascimento'];
    
    //comando mysql para alterar
    $sql       = "update autor set nome = '$nome',
                           nacionalidade = '$nacionalidade',
                           ocupacao = '$ocupacao',
                           data_nascimento = '$data_nascimento'
          where codautor = '$codautor'";
    $resultado = mysqli_query($conectar, $sql);
    
    if ($resultado == 1) {
        
?>
             <script>
                  alert("Alteracao efetuada com sucesso.");
                  location.href="autor.html";
              </script>
              <?php
        
    } else {
?>
             <script>
                  alert("Erro... Nao foi possivel alterar. ");
                  location.href="autor.html";
              </script>
              <?php
    }
}