<?php
//【重要】
/**
 * DB接続のための関数をfuncs.phpに用意
 * require_onceでfuncs.phpを取得
 * 関数を使えるようにする。
 */
require_once('funcs.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_an_table;');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $date = $result['indate'];
        $word_1 = $result['word_1'];
        $word_2 = $result['word_2'];
        $word_3 = $result['word_3'];


        // GETデータ送信リンク作成
        // <a>で囲う。
        // $view .= '<p>';
        //     $view .= '<a href=detail.php?id=' . $result['id'] . '">';
        // $view .= $result['indate'] . '：' . $result['word_1']. $result['word_2'];
        //     $view .= '</a>';

        //     $view .= '<a href=delete.php?id=' . $result['id'] . '">';
        // $view .= '[削除]';
        //     $view .= '</a>';

        // $view .= '</p>';


        // $view .= '<tr>';
        //     $view .= '<a href=detail.php?id=' . $result['id'] . '">';
        // $view .= $result['indate'] . '：' . $result['word_1']. $result['word_2'].$result['word_3'];
        //     $view .= '</a>';

        //     $view .= '<a href=delete.php?id=' . $result['id'] . '">';
        // $view .= '[削除]';
        //     $view .= '</a>';

        // $view .= '</tr>';

        $view.= "
                <tr>
                    <td>$date</td>
                    <td>$word_1</td> 
                    <td>$word_2</td> 
                </tr>'
                ";

            $view .= '<a href=detail.php?id=' . $result['id'] . '">';
        $view .= '[修正]';
            $view .= '</a>';        
            $view .= '<a href=delete.php?id=' . $result['id'] . '">';
        $view .= '[削除]';
            $view .= '</a>';

    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>単語</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <!-- <a href="detail.php"></a> -->
            <table>
                <tr class="header">
                        <th class="item2">記入日</th>
                    <th class="item2">覚えた単語</th>
                    <th class="item2">覚えた単語の意味</th>
                    <th class="item2">コメント</th>
                </tr>
                <?= $view ?>
            </table>    
            
        </div>
        <!-- <div><?= $view ?></div> -->


    </div>
    <!-- Main[End] -->

</body>

</html>
