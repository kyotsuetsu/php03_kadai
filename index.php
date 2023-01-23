<?php
require_once('common/head_parts.php');

?>

<!DOCTYPE html>
<html lang="ja">

<head>
<?= head_parts('chitalk学習管理')?>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            </div>
        </nav>
    </header>

<!--アイコン -->


<!-- 目標設定 -->
<form method="POST" action="insert.php">
    <label for="time">学習目標時間を設定してください</label>
    <select name="time" id="time">
        <option value="">時間を選んでください</option>
        <option value="">1時間</option>
        <option value="">2時間</option>
        <option value="">3時間</option>
    </select>
    <br>
    <label>自分で目標を決める<input type="text" name="sTime"></label>
</form>
<!-- セットした学習内容の表示 -->




 

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>今日の学習内容を記録しましょう！(空欄があってもOK!) 
                </legend>
                <label>単語　　<textarea  name="word_1" rows="4" cols="40"></textarea></label><br>
                <label>文法　　<textarea  name="word_2" rows="4" cols="40"></textarea></label><br>
                <label>フレーズ<textarea  name="word_3" rows="4" cols="40"></textarea></label><br>
                <label>その他　<textarea name="content" rows="4" cols="40"></textarea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
