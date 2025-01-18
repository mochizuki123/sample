<?php

//1. POSTデータ取得

$id = $_GET["id"]; // ここでidを取得

//2. DB接続します
//*** function化する！  *****************
require_once("funcs.php"); // funcs.phpを読み込んで関数を使えるようにする
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare(
    "DELETE FROM gs_kadai3_table where id = :id"); // ここで取得したidをバインド
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: select.php');
    exit();
}



?>