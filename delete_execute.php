<?php
// idを取得
$id = $_POST["id"];

// SQLを実行し、データをデリート
// TODO エラー時の処理
$pdo = new PDO('mysql:dbname=gs_db;host=localhost', 'root', '');
$stmt = $pdo->query('SET NAMES utf8');
$stmt = $pdo->prepare("DELETE FROM gs_cms_user
		WHERE id = :id");

$stmt->bindValue(':id', $id);
$result = $stmt->execute();

// delete_complete.php へリダイレクト
header('location: delete_complete.php');
exit;
?>