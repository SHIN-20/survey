<?php
$kikkake = array("知人の紹介", "SNS・Web", "チラシ・ポスター", "メール案内", "その他");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>講演会アンケート</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<form action="save.php" method="post">
<h1>講演会アンケート</h1>

<p>お名前（必須）
<input type="text" name="name" required></p>

<p>メールアドレス（必須）
<input type="email" name="email" required></p>

<p>Q1. ご参加の満足度
<select name="q1">
<option value="5">5（とても満足）</option>
<option value="4">4</option>
<option value="3">3</option>
<option value="2">2</option>
<option value="1">1（不満）</option>
</select></p>

<p>Q2. 講演内容の分かりやすさ
<select name="q2">
<option value="5">5（とても分かりやすい）</option>
<option value="4">4</option>
<option value="3">3</option>
<option value="2">2</option>
<option value="1">1（分かりにくい）</option>
</select></p>

<p>Q3. 講演時間の長さ<br>
<label><input type="radio" name="q3" value="長い" required style="width:auto">長い</label>
<label><input type="radio" name="q3" value="ちょうどよい" style="width:auto">ちょうどよい</label>
<label><input type="radio" name="q3" value="短い" style="width:auto">短い</label></p>

<p>Q4. 参加のきっかけ
<select name="q4">
<?php foreach ($kikkake as $k) { echo "<option value=\"$k\">$k</option>"; } ?>
</select></p>

<p>Q5. 今後聞きたいテーマ
<textarea name="q5" rows="3"></textarea></p>

<p>Q6. ご意見・ご感想
<textarea name="q6" rows="3"></textarea></p>

<p><button type="submit">送信する</button></p>

<hr>
<p style="text-align:center"><a href="result.php">集計結果を見る（パスワードが必要です）</a></p>

</form>
</body>
</html>
