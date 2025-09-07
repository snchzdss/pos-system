<?php
    require __DIR__ . '/../database/pos_db.php';

    $username = 'admin';
    $password = 'admin@123';
    $role = 'admin';
    
    try{
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $pdo -> prepare($sql);
        $stmt->execute([$username]);

        if($stmt->fetch()){
            echo "Admin account already exists.";
            exit();
        }

        $insert = $pdo->prepare("INSERT INTO users (username, password, role) VALUES(?, ?, ?)");
        $insert->execute([$username, $password, $role]);
        echo "Admin account succesfully created.";
    }

    catch (Exception $error){
        echo "Error : " . $error->getMessage();
    }



?>