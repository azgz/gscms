<?php
// index.phpからidが渡ってくるので、取得
// TODO idが渡ってこない場合はエラーにして、index.phpへ戻す
$id = $_GET["id"];

// SQLを実行し、DBから該当idのデータを取得
// TODO エラー時の処理
$pdo = new PDO('mysql:dbname=gs_db;host=localhost', 'root', '');
$stmt = $pdo->query('SET NAMES utf8');
$stmt = $pdo->prepare("SELECT * FROM gs_cms_user WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// SQLの結果から、HTML出力用の変数を定義
$name = $result['name'];
$email = $result['email'];
$age = $result['age'];
$info = $result['info'];

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
<p>お名前:<input type="text" name="name" size="20" value="<?php echo $name ?>"></p>
<p>e-mail:<input type="text" name="mail" size="20" value="<?php echo $email ?>"></p>
<p>年齢:<input type="text" name="age" size="20" value="<?php echo $age ?>"></p>
<p>コメント:<input type="text" name="info" size="20" value="<?php echo $info ?>"></p>
<p><input type="submit" value="更新"></p>
<input type="hidden" name="id" value="<?php echo $id ?>">
</form>

<div>
	<ul>
		<li><a href="index.php">Top</a></li>
	</ul>
</div>
</body>
</html>