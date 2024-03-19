<?php
require '../../common/database.php';


//POSTでパラメータを取得
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];

//ログイン処理
$database_handler = getDatabaseConnection();
if ($statement = $database_handler->prepare('SELECT id, username, password FROM users
                                                WHERE email = :user_email
                                                AND password = :user_password')){
    $statement->bindParam('user_email', $user_email);
    $statement->bindParam('user_password', $user_password);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        $_SESSION['errors'] = [
            'メールアドレスかパスワードが間違っています'
        ];
        header('Location: ../../login/');
        exit;
    }

    $name = $user['name'];
    $id = $user['id'];
    header('Location: ../../main.php');
    exit;
}
?>