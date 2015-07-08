<?php
// formから値を取得
$mail      = $_POST["mail"];
$password  = $_POST["password"];

// SQLを実行し、e-mail, パスワードが一致するレコードがあるかチェック
$pdo = new PDO('mysql:dbname=gs_db;host=localhost', 'root', '');
$stmt = $pdo->query('SET NAMES utf8');
$stmt = $pdo->prepare("SELECT * FROM gs_cms_admin_user
		WHERE email = :email AND password = :password");

$stmt->bindValue(':email', $mail);
$stmt->bindValue(':password', $password);
$stmt->execute();
$count = $stmt->rowCount();

// 失敗時はlogin.php へリダイレクト
if($count != 1) {
	header('location: login.php');
	exit;
}

// TODO 成功時はセッションにログイン情報をセット

// index.php へリダイレクト
header('location: index.php');
exit;
?>