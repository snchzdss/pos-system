<?php
require 'pos_db.php';

$username = 'admin';
$password = 'superIT1234';
$role = 'admin';

$sql = "SELECT * FROM users WHERE username=?";
$stmt = $pdo->prepare($sql);
$stmt -> execute([$username]);


try{
    if ($stmt->fetch()){
    echo "User 'admin' already exists";
    exit;
    }

    $ins = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $ins->execute([$username, $hash, $role]);

    echo "Admin user created. Username: admin | Password: {$passwordPlain}";
} 

catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>