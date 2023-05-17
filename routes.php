<?php 

$route = $_GET['url'] ?? '/';
if(isset($_SESSION['admin'])){
    $admin = $_SESSION['admin'];
}



    switch ($route) {
        case '/':
            include_once("./views/home.php");
            break;
        case 'admin':
            if(isset($admin)){
                if($admin == 1){
                    include_once("./views/admin.php");
                }else{
                    include_once("./views/home.php");
                }
                break;
            }

        case 'logout':
            session_destroy();
            include_once("./views/home.php");
            break;

        case 'login':
            include_once("./views/login.php");
            break;    
    }


?>