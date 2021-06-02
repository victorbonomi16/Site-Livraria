<?php
// iniciar a sessão e conectar no servidor e database.



session_start();
$conectar = mysql_connect('localhost', 'root', '');
$banco    = mysql_select_db('livraria', $conectar);



// se clicou no botão entrar



if (isset($_POST['entrar'])) {
    $login  = $_POST['login'];
    $senha  = $_POST['senha'];
    $entrar = $_POST['entrar'];
    
    
    
    $verifica = mysql_query("SELECT login, senha FROM usuarios
                         WHERE login = '$login' AND senha = '$senha'") or die("erro ao selecionar");
    
    if (mysql_num_rows($verifica) <= 0) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');
        window.location.href='login.html';</script>";
        die();
    } else {
        //direciona para tela dos menus (cadastros)
        setcookie("login", $login);
        header("Location:cadastros.html");
    }
    
}
?>