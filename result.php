<?php
$password = "11111";

$show = false;
if (isset($_POST["password"]) && $_POST["password"] === $password) {
    $show = true;
}

if (!$show) {
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>パスワード入力</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<form action="result.php" method="post">
<h1>集計結果を見る</h1>
<p>パスワードを入力してください。
<input type="password" name="password"></p>
<p><button type="submit">表示する</button></p>
<?php if (isset($_POST["password"])) { echo "<p style=\"color:#c0392b\">パスワードが違います。</p>"; } ?>
<hr>
<p style="text-align:center"><a href="form.php">アンケートに戻る</a></p>
</form>
</body>
</html>
<?php
exit;
}

$file = "answers.csv";
$rows = array();

if (file_exists($file)) {
    $fp = fopen($file, "r");
    fgetcsv($fp, 0, ",", "\"", "\\");
    while ($line = fgetcsv($fp, 0, ",", "\"", "\\")) {
        $rows[] = $line;
    }
    fclose($fp);
}

$total = count($rows);

$q1_sum = 0;
$q2_sum = 0;
$q3 = array("長い" => 0, "ちょうどよい" => 0, "短い" => 0);
$q4 = array();

foreach ($rows as $r) {
    $q1_sum += $r[3];
    $q2_sum += $r[4];
    if (isset($q3[$r[5]])) { $q3[$r[5]]++; }
    if (!isset($q4[$r[6]])) { $q4[$r[6]] = 0; }
    $q4[$r[6]]++;
}

$q1_avg = $total > 0 ? round($q1_sum / $total, 2) : 0;
$q2_avg = $total > 0 ? round($q2_sum / $total, 2) : 0;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>集計結果</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card">
<h1>集計結果</h1>

<p>回答者数：<?php echo $total; ?> 人</p>

<h2>Q1. 満足度</h2>
<p>平均：<?php echo $q1_avg; ?> 点</p>

<h2>Q2. 分かりやすさ</h2>
<p>平均：<?php echo $q2_avg; ?> 点</p>

<h2>Q3. 講演時間</h2>
<ul>
<?php foreach ($q3 as $k => $v) { echo "<li>{$k}：{$v} 人</li>"; } ?>
</ul>

<h2>Q4. 参加のきっかけ</h2>
<ul>
<?php foreach ($q4 as $k => $v) { echo "<li>{$k}：{$v} 人</li>"; } ?>
</ul>

<h2>Q5・Q6. 自由記述</h2>
<table>
<tr><th>お名前</th><th>聞きたいテーマ</th><th>意見・感想</th></tr>
<?php foreach ($rows as $r) {
    echo "<tr><td>" . htmlspecialchars($r[1]) . "</td><td>" . htmlspecialchars($r[7]) . "</td><td>" . htmlspecialchars($r[8]) . "</td></tr>";
} ?>
</table>

<hr>
<p style="text-align:center"><a href="form.php">アンケートに戻る</a></p>
</div>
</body>
</html>
