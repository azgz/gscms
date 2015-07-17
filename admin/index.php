<?php
// セッションからログインステータスをチェック
session_start();

// 非ログイン時は、login.php へリダイレクト
if (!isset($_SESSION["STATUS"])) {
	header('location: login.php?error=login');
}

require_once '../conf/config.php';

// ログイン時は、SQLを実行し、DBから一覧を取得
// TODO エラー時の処理
// TODO ページングの処理, 5件づつ表示
$pdo = new PDO(DSN, DB_USER, DB_PASS);
$stmt = $pdo->prepare("SELECT * FROM gs_cms_user");
$stmt->execute();
$view = "";

// SQLの結果から、HTMLを生成
while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
	$id = $result['id'];
	$name = $result['name'];
	$email = $result['email'];
	$age = $result['age'];
	$create_date = $result['create_date'];
	$view .= '<ul><li>'. $id . '</li><li>'. $name . '</li><li>' . $email . '</li><li>'
			. $age . '</li><li>' . $create_date . '</li><li><a href="update.php?id=' . $id . '">更新</a></li></ul>';
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>g's CMS | 管理画面Top</title>
</head>
<body>
<h2>g's CMS | 管理画面Top</h2>
<div>
	<ul>
		<li>id</li>
		<li>名前</li>
		<li>e-mail</li>
		<li>年齢</li>
		<li>登録時間</li>
	</ul>
	<!-- データベースの取得結果はここで表示 -->
	<?php echo $view ?>
</div>
</body>
</html>