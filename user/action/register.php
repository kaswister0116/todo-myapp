<?php
session_start();
require '../../common/validation.php';
require '../../common/database.php';

//パラメータ取得
$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$user_password1 = $_POST['user_password1'];
$user_password2 = $_POST['user_password2'];

//POSTの中身をsessionに保存
$_SESSION['form_input'] = $_POST;

//バリデーションメッセージ
$_SESSION['errors'] = [];

//email Check
emptyCheck($_SESSION['errors'], $user_email, "メールアドレスを入力してください。");
stringMaxSizeCheck($_SESSION['errors'], $user_email, "メールアドレスは255文字以内で入力してください。");
mailAddressCheck($_SESSION['errors'], $user_email, "正しいメールアドレスを入力してください。");
//password Check
emptyCheck($_SESSION['errors'], $user_password1, "パスワードを入力してください。");
emptyCheck($_SESSION['errors'], $user_password2, "パスワードを入力してください。");
stringMaxSizeCheck($_SESSION['errors'], $user_password1, "パスワードは255文字以内で入力してください。");
stringMaxSizeCheck($_SESSION['errors'], $user_password2, "パスワードは255文字以内で入力してください。");
stringMinSizeCheck($_SESSION['errors'], $user_password1, "パスワードは4文字以上で入力してください。");
stringMinSizeCheck($_SESSION['errors'], $user_password2, "パスワードは4文字以上で入力してください。");
halfAlphanumericCheck($_SESSION['errors'], $user_password1, "パスワードは半角英数字で入力してください。");
halfAlphanumericCheck($_SESSION['errors'], $user_password2, "パスワードは半角英数字で入力してください。");

//入力した2つのパスワードが同一か
isPasswordSame($_SESSION['errors'], $user_password1, $user_password2, '2つのパスワードが一致していません。');

if (!$_SESSION['errors']) {
    mailAddressDuplicationCheck($_SESSION['errors'], $user_email, "既に登録されています");
}

if ($_SESSION['errors']) {
    header('Location: ../../user');
    exit;
}

$database_handler = getDatabaseConnection();

try {
    if ($statement = $database_handler->prepare('INSERT INTO users (email, username, password) VALUES(:user_email, :user_name, :user_password)')) {
        $hashed_password = password_hash($user_password1, PASSWORD_DEFAULT);

        $statement->bindParam(':user_email', htmlspecialchars($user_email));
        $statement->bindParam(':user_name', htmlspecialchars($user_name));
        $statement->bindParam(':user_password', htmlspecialchars($hashed_password));
        $statement->execute();
        
        //ユーザー情報保持
        $_SESSION['user'] = [
            'name' => $user_name,
            'id' => $database_handler->lastInsertId(),
        ];
    }
} catch (Throwable $e) {
    echo $e->getMessage();
    exit;
}

header('Location: ../../list');
exit;
?>