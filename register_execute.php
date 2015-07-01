<?php
// formから値を取得
$name = $_POST["name"];
$mail = $_POST["mail"];
$age  = $_POST["age"];
$info  = $_POST["info"];

// TODO 入力チェックを実装

// SQLを実行し、データをインサート
// TODO エラー時の処理
$pdo = new PDO('mysql:dbname=gs_db;host=localhost', 'root', '');
$stmt = $pdo->query('SET NAMES utf8');
$stmt = $pdo->prepare("INSERT INTO gs_cms_user(
		id, name, email, age, info, update_date, create_date) VALUES (
		NULL, :name, :email, :age, :info, sysdate(), sysdate())");

$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $mail);
$stmt->bindParam(':age', $age);
$stmt->bindParam(':info', $info);
$flag = $stmt->execute();

// register_complete.php へリダイレクト
header('location: register_complete.php');
exit;
?>