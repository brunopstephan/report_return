<div class="login">
    <form action="" method="post">
        <h3>Nome:</h3>
        <input class="input" name="name" type="text" placeholder="Nome">
        <h3>Senha:</h3>
        <input class="input" name="password" type="password" placeholder="Senha">
        <input class="btn-all" type="submit" value="Entrar" name="login">
    </form>
    <br>
<?php 
    if(isset($_POST['login'])){
        auth($_POST['name'], $_POST['password']);
    }
?>
</div>
