<?php
if (!isset($_SESSION)){
    session_start();
}

/**
 * ログインしているかチェック
 * @return bool
 */
function isLogin() {
    if (isset($_SESSION['user'])) {
        return true;
    }
    return false;
}

/**
 * ログインしているユーザー名を取得
 * @return string
 */
function getLoginUserName() {
    if (isset($_SESSION['user'])) {
        $name = $_SESSION['user']['user_name'];
    return $name;
    }

    return "";
}

/**
 * ログインしているユーザーIDを取得する
 * @return  | null
 */
function getLoginUserId() {
    if (isset($_SESSION['user'])) {
        return $_SESSION['user']['id'];
    }
    return null;
}

?>