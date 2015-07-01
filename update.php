<?php
// index.phpからidが渡ってくるので、取得
// SQLを実行し、DBから該当idのデータを取得
// 取得したデータをformに埋め込む
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>g's CMS | ユーザー情報更新</title>
</head>
<body>
<form method="post" action="update_execute.php">
<p>お名前:<input type="text" name="name" size="20"></p>
<p>e-mail:<input type="text" name="mail" size="20"></p>
<p>年齢:<input type="text" name="age" size="20"></p>
<p>コメント:<input type="text" name="info" size="20"></p>
<p><input type="submit" value="送信"></p>
</form>

<div>
	<ul>
		<li><a href="index.php">Top</a></li>
	</ul>
</div>
</body>
</html>