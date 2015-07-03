<?php
// index.phpからidが渡ってくるので、取得
// SQLを実行し、DBから該当idのデータを取得
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>g's CMS | ユーザー情報削除</title>
</head>
<body>
<form method="post" action="delete_execute.php">
<!-- 以下にDBから取得した情報を埋め込む -->
<p>お名前:</p>
<p>e-mail:</p>
<p>年齢:></p>
<p>コメント:</p>
<p><input type="submit" value="削除"></p>
</form>

<div>
	<ul>
		<li><a href="index.php">Top</a></li>
	</ul>
</div>
</body>
</html>