<?php
session_start();
//require '../common/';

?>

<!DOCTYPE html>
<html lang="ja">
    <?php
        //include_once
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todolist</title>
    <link rel="stylesheet" href="../static/stylesheet.css">
</head>
<body>
    <div class="header">
        <div class="header-left">
            Todoリスト
        </div>
        <div class="header-right">
            <ul>
                <li><a href="#">SIGN IN</a></li>
                <li><a href="#">SIGN UP</a></li>
            </ul>
        </div>
    </div>
    <main class="login-main">
        <div class="login-box">
        <?php
        if (isset($_SESSION['errors'])) {
            echo '<div>';
            foreach ($_SESSION['errors'] as $error) {
                echo "<div>{$error}</div>";
            }
            echo '</div>';
        }
        ?>
            <p class="title-signin">Sign Up</p>
            <form action="./action/login.php" method="post" class="login-form">
                <div class="border">
                        <label class="login-label">Name</label>
                        <input type="text" name="user_name" class="login-input" placeholder="お名前">
                    </div>    
                <div class="border">
                    <label class="login-label">Email</label>
                    <input type="text" name="user_email" class="login-input" placeholder="アドレス">
                </div>
                <div class="border">
                    <label class="login-label">Password</label>
                    <input type="password" name="user_password1" class="login-input" placeholder="パスワード">
                </div>
                <div class="border">
                    <label class="login-label">Password</label>
                    <input type="password" name="user_password2" class="login-input" placeholder="もう一度入力してください">
                </div>
                <div class="login-btn-container">
                    <button class="login-btn" type="submit">ログイン</button>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <p class="">
            &copy;2024
        </p>
    </footer>
</body>
</html>