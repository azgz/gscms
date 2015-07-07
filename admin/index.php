<?php
// セッションからログインステータスをチェック
// 非ログイン時は、login.php へリダイレクト
// ログイン時は、SQLを実行し、DBから一覧を取得
// SQLの結果から、HTMLを生成
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
<div>
	<ul>
		<li><a href="register.php">登録</a></li>
	</ul>
</div>
</body>
</html>