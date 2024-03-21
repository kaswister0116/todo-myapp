<?php
require '../common/auth.php';
require '../common/database.php';

if(!isLogin()) {
    header("Location: ../login/");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
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
                <li><a href="#">HOME</a></li>
                <li><a href="#">MYPAGE</a></li>
                <li><a href="./action/logout.php">LOGOUT</a></li>
            </ul>
        </div>
    </div>
    <div class="todo-main-title">
        <h1>TodoList</h1>
    </div>
    <main class="todo-main">
        <div class="create-todo-box">
            <p class="title-create-todo">Create Todo</p>
            <form action="処理先" method="post" class="create-todo-form">
                <div class="border">
                    <label class="create-todo-label">タイトル</label>
                    <input type="text" name="todo-title" class="create-todo-input" placeholder="">
                </div>
                <div class="border">
                    <label class="create-todo-label">内容</label>
                    <textarea type="text" name="todo-description" class="create-todo-description" placeholder=""></textarea>
                </div>
                <div class="create-todo-btn-container">
                    <button class="create-todo-btn" type="submit">追加</button>
                </div>
            </form>
        </div>
        <div class="todolist-box">
            <div class="list">
                <input type="checkbox">
                <a href="#">Todo1</a>
                <img src="" alt="編集">
                <img src="" alt="ゴミ箱">
            </div>

        </div>
    </main>
    <footer>
        <p class="">
            &copy;2024
        </p>
    </footer>
</body>
</html>