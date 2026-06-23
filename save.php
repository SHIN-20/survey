<?php
$file = "answers.csv";

$row = array(
    date("Y-m-d H:i"),
    $_POST["name"],
    $_POST["email"],
    $_POST["q1"],
    $_POST["q2"],
    $_POST["q3"],
    $_POST["q4"],
    $_POST["q5"],
    $_POST["q6"]
);

if (!file_exists($file)) {
    $header = array("日時", "お名前", "メールアドレス", "満足度", "分かりやすさ", "時間", "きっかけ", "聞きたいテーマ", "意見感想");
    $fp = fopen($file, "a");
    fputcsv($fp, $header, ",", "\"", "\\");
    fclose($fp);
}

$fp = fopen($file, "a");
fputcsv($fp, $row, ",", "\"", "\\");
fclose($fp);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>送信完了</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card">
<h1>ご回答ありがとうございました</h1>
<p style="text-align:center"><a href="form.php">アンケートに戻る</a></p>
</div>
</body>
</html>
