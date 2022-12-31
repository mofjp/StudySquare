<?php
/*   //include 'loginCheck.php';
  include 'db_config.php';
  $user = [];

  try
  {
     // DBconnect
     $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     // DB取得
     $stmt = $db->query("SELECT * FROM `times` ORDER BY `time` DESC LIMIT 3");
     $times = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $stmt = null;
     $stmt = $db->query("SELECT name FROM `user`");
     $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $db = null;
   }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   exit;
  } */
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="./stylesheet/ranking_style.css">
    <title>ランキング</title>
</head>
<body>
  <table>
    <tr>
    <th>TOP</th><th>NAME</th>
    </tr>
    <?php
    for($i=0; $i<10; $i++){
        ?>
        <tr>
        <td class="no"><?php echo $i+1; ?>.</td><!-- 順位 -->
        <td><?php echo $user[$times[$i]['user_host']-1]['name']; ?></td>  <!-- 名前 -->
        </tr>
    <?php } ?>
  </table>
</body>
</html>
