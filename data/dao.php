<?php 


    require("connection.php");

/*     function getDay($day){
        $result = connection()->query('SELECT Schedule.*, User.username
        FROM Schedule
        INNER JOIN User ON Schedule.supervisor = User.id WHERE day='.$day.'');

        return $result; 

    } */

    function all(){
        $result = connection()->query('SELECT * from Reports ORDER BY id DESC' );

        return $result;
    }

    function open(){
        $result = connection()->query('SELECT * from Reports WHERE state = 0 ORDER BY id DESC' );

        return $result;
    }

    function concluded(){
        $result = connection()->query('SELECT * from Reports WHERE state = 1 ORDER BY id DESC' );

        return $result;
    }

    function insert($code, $report, $date, $name, $email){
        $conn = connection();
        $sql = "INSERT INTO Reports(code, report, date, reportdate, name, email) VALUES (?, ?, ?, ?, ?, ?) ";
        
        $reportdate = date("Y-m-d");

        $stmt = mysqli_prepare($conn, $sql);
        $stmt->bind_param("ssssss", $code, $report, $date, $reportdate, $name, $email);

        $stmt->execute();

        //echo "<script> location.href = './'; </script>";

        
        $stmt->close();
        $conn->close();
    }
    
    function conclude($id){
        $conn = connection();
        $sql = "UPDATE Reports SET state=1 WHERE id=?";

        $stmt = mysqli_prepare($conn, $sql);
        $stmt->bind_param("i", $id);

        $stmt->execute();

        echo "<script> location.href = 'admin'; </script>";

        
        $stmt->close();
        $conn->close();
    }

    function deconclude($id){
        $conn = connection();
        $sql = "UPDATE Reports SET state=0 WHERE id=?";

        $stmt = mysqli_prepare($conn, $sql);
        $stmt->bind_param("i", $id);

        $stmt->execute();

        echo "<script> location.href = 'admin'; </script>";

        
        $stmt->close();
        $conn->close();
    }
    
    
    function delete($id){
        $conn = connection();
        $sql = "DELETE FROM Reports WHERE id=?";

        $stmt = mysqli_prepare($conn, $sql);
        $stmt->bind_param("i", $id);

        $stmt->execute();

        echo "<script> location.href = 'admin'; </script>";

        
        $stmt->close();
        $conn->close();
    }


    function response($response, $id){
        $conn = connection();
        $sql = "UPDATE Reports SET response=? WHERE id=?";

        $stmt = mysqli_prepare($conn, $sql);
        $stmt->bind_param("si", $response, $id);

        $stmt->execute();

        echo "<script> location.href = 'admin'; </script>";
        
        $stmt->close();
        $conn->close();
    }

    function reportreturn($code){
        $result = connection()->query('SELECT * from Reports WHERE code="'.$code.'"' );

        return $result->fetch_array();
    }

    function verifycode($code){
        $result = connection()->query('SELECT * from Reports WHERE code="'.$code.'"' );

        return $result->fetch_array();
    }

    function getAdmin($name){
        $result = connection()->query('SELECT * from Admin WHERE name="'.$name.'"' );

        return $result->fetch_array();
    }

    function auth($name, $password){
        
        if(getAdmin($name) != ""){
            $admin = getAdmin($name);
            if(password_verify($password, $admin['password'])){
                $_SESSION['admin'] = 1;
                echo "<script> location.href = 'admin'; </script>";
            }else{
                echo "Usuário ou Senha incorreta";
            }
        }else{
            echo "Usuário ou Senha incorreta";
        }
    }



?>