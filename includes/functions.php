<?php

//check if there is a session
if (session_status() === PHP_SESSION_NONE){
    session_start();
}


//check if a token exists
function csrf_token() : string {
    if (empty($_SESSION['csrf_token'])){
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}


function verify_csrf(string $tokenFromForm): bool {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $tokenFromForm);
}




?>