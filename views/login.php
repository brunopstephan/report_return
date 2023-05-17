<form action="" method="post">
    <h2>Nome:</h2>
    <input name="name" type="text" placeholder="Nome">
    <h2>Senha:</h2>
    <input name="password" type="password" placeholder="Senha">
    <input type="submit" value="Entrar" name="login">
</form>

<?php 
    if(isset($_POST['login'])){
        auth($_POST['name'], $_POST['password']);
       
    }
?>