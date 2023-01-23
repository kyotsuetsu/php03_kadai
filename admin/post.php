<?php
session_start();
require_once('../funcs.php');
require_once('../common/head_parts.php');
loginCheck();

$title = '';
$content = '';

if(isset($_SESSION['post']['title'])){
    $title = $_SESSION['post']['title'];
}

if(isset($_SESSION['post']['content'])){
    $content = $_SESSION['post']['content'];
}

// echo'<pre>';
// var_dump($title);
// echo'<pre>';

// echo'<pre>';
// var_dump($_SESSION);
// echo'<pre>';

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <?= head_parts('記事管理') ?>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">ブログ画面へ</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="post.php">投稿する</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">投稿一覧</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="logout.php">ログアウト</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- // もしURLパラメータがある場合 -->
    <?php if(isset($_GET['error'])) :?>
        <p class='text-danger'>記入内容を確認してください。</p>
    <!-- どうやって受け取ってる？URLと認識してるのか？ -->
    <?php endif ?>    

    <form method="POST" action="confirm.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">タイトル</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="title" value="<?= $title ?>">
            <div id="emailHelp" class="form-text">※入力必須</div>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">記事内容</label>
            <textArea type="text" class="form-control" name="content" id="content" aria-describedby="content" rows="4" cols="40">  <?= $content ?>  </textArea>
            <div id="emailHelp" class="form-text">※入力必須</div>
        </div>

    <!-- 画像投稿を追加 -->
        <div class="mb-3">
            <label for="title" class="form-label">画像</label>
            <input type="file" name="img" >
        </div>

        <button type="submit" class="btn btn-primary">投稿する</button>
    </form>
</body>
</html>
