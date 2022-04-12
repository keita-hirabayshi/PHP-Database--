<?php
/**
 * DBから値を取得
 */
$user = 'test_user';
$pwd = 'pwd';
$host = 'localhost';
$dbName = 'test_phpdb';
$dsn = "mysql:host={$host};port=8889;dbname={$dbName};";
// 上記の第一引数にてどのデータベースに接続するのかを、指定する。
$conn = new PDO($dsn, $user, $pwd);

$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// setattributeにて、意図的にデフォルト設定することができる。（これによって、連想配列のデータのみ返ってくるようになる）

$pst = $conn->query('select * from mst_shops');
$result = $pst->fetchAll(PDO::FETCH_ASSOC);
// ＄pstにて大まかなデータ（オブジェクト形式）は取得できて、その中でデータのみを指定する（fetchall）。fetch_assocとしてあげることで、連想配列のデータのみ返ってくる。

// preで囲んであげると、実際に存在する改行なども表示してくれるので見やすくなる。
echo '<pre>';
print_r($result);
echo '</pre>';

$conn = null;
// データベースへの接続が終了したら、上記のようにnullを代入してあげて、connectionを切ってあげないといけない。
// phpではデフォルトで入っているので省略可能。