<?php

//1. POSTデータ取得
$word_1   = $_POST['word_1'];
$word_2  = $_POST['word_2'];
$word_3    = $_POST['word_3'];
$content = $_POST['content'];

//2. DB接続します
//*** function化する！  *****************
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare(
    'INSERT INTO
                        gs_an_table(
                            word_1, word_2, word_3, content, indate
                            )
                        VALUES (
                            :word_1, :word_2, :word_3, :content, sysdate()
                            );'
);

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':word_1', $word_1, PDO::PARAM_STR);
$stmt->bindValue(':word_2', $word_2, PDO::PARAM_STR);
$stmt->bindValue(':word_3', $word_3, PDO::PARAM_INT); //PARAM_INTなので注意
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: index.php');
    exit();
}
