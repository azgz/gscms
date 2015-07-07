<?php
// formから値を取得
$id = $_POST["id"];
$name = $_POST["name"];
$mail = $_POST["mail"];
$age  = $_POST["age"];
$info  = $_POST["info"];

// TODO 入力チェックを実装

// SQLを実行し、データをアップデート
// TODO エラー時の処理
$pdo = new PDO('mysql:dbname=gs_db;host=localhost', 'root', '');
$stmt = $pdo->query('SET NAMES utf8');
$stmt = $pdo->prepare("UPDATE gs_cms_user SET
		name = :name, email = :email, age = :age, info = :info, update_date = sysdate()
		WHERE id = :id");

$stmt->bindValue(':id', $id);
$stmt->bindValue(':name', $name);
$stmt->bindValue(':email', $mail);
$stmt->bindValue(':age', $age);
$stmt->bindValue(':info', $info);
$result = $stmt->execute();

// update_complete.php へリダイレクト
header('location: update_complete.php');
exit;
?>