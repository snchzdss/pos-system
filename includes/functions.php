<?php

// check session, if none start a new session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// check if there is an existing CSRF token in the session. 
// If none, create a new CSRF token then return it
function csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token']; 
}

// verify if CSRF token from the form matches the one stored in the session
function csrf_verification(string $tokenFromForm): bool {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $tokenFromForm);
}

function is_logged_in(){
    return isset($_SESSION['user_id']);
}

function require_login() : void{
    if (!is_logged_in()){
        header("Location: index.php");
        exit;
    }
}

?>
