<?php
    require __DIR__ . '/../includes/functions.php';

    if(is_logged_in()){
        header("Location: dashboard.php");
        exit;
    }

    $token = csrf_token();
    $error = $_SESSION['error'] ?? null;
    unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS SYSTEM LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background-color: #1b263b;
            font-family: sans-serif;
        }
        .txt{
            font-weight: bolder;
        }
        .login-card{
            max-width: 420px !important; 
            width: 100% !important;
        }
        .img-logo{
            max-width: 120px;
        }
        .btn-signup{
            background-color: #1b263b;
        }
        .btn-signup:hover{
            background-color: white;
            color: black;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="card shadow-sm p-4 login-card">

            <div class="text-center">
                <img src="../assets/img/pos.png" alt="pos-logo" class="img-fluid mb-3 img-logo">
            </div>

            <h3 class="mb-3 text-center txt">POS SYSTEM LOGIN</h3>

            <?php if($error):?>
                <div class="alert alert-danger py-2" role = "alert"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form action="process_login.php" method="post" novalidate>
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($token);?>">
                <div class="form-group mb-3">
                    <label for="username" class="mb-1">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required autofocus>
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="mb-1">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <button class="btn btn-primary w-100 btn-signup" type="submit">Sign in</button>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>