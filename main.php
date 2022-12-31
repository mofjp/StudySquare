<?php
  include 'loginCheck.php';
  include 'db_config.php';
  $user = [];
  $stans = null;

  try
  {
     // DBconnect
     $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     // DB取得
     $stmt = $db->query("SELECT i1.`user_host` , i1.`time` , (SELECT count(i2.`time`) FROM time_ranking i2 WHERE i1.`time` < i2.`time`) + 1 AS 'rank' FROM time_ranking i1 ORDER BY rank ");
     $times = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $stmt = null;
     $stmt = $db->query("SELECT name FROM `user`");
     $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $db = null;
     
     $test =  $_SESSION['host']-1;//-1で配列の数列に合わせる  
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   exit;
  }
?>

<!DOCTYPE html>
<html lang="jp">
<head>
  <title>StudySquare</title>    
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link rel="stylesheet" href="./stylesheet/main_style.css">
  <link rel="icon" href="ss.png">
</head>

<body>
  <div class="pc-page">
    <!--<div id="Audio-Control">
      <h3>Music</h3>
      <audio id="bgm" src="./music/Cash-Back.mp3" preload autoplay loop muted></audio>
      <button onclick="enableMute()" class="off active" type="button">OFF</button>
      <button onclick="disableMute()" class="on" type="button">ON</button>
    </div>-->

    <div class="menu"> <!-- 左ページ -->
      <a class="title" href="https://web20269.azurewebsites.net/StudySquare/main.php"><h1>Study Square</h1></a>
      <form name="Hai" method="POST" action="">
        <ul>
          <li><button type="submit" name="enter" >学習室</button></li>
          <!-- <li><button type="submit" name="ranking" >ランキング</button></li> -->
          <li><button type="submit" name="log">学習記録</button></li>
        </ul>
      </form>
    </div>
    
    <div class="main"> <!-- 中心ページ -->
      <?php 
        if(isset($_POST['enter']))
        {
           include 'enter.php';
        }
        else if(isset($_POST['ranking']))
        {
           include 'ranking.php';
        }
        else if(isset($_POST['log']))
        {
           echo "log";
        }          
      ?>
          
    </div>
    
    <div class="right"> <!-- 右ページ -->
      <div class="ranking">
        <h2>ranking</h2>
        <?php include 'ranking.php'; //ランキング呼び出し ?>

        <h3>YOUR RANK</h3>
        <table>
          <tr>
            <td>
              <?php
                $myhost =  $_SESSION['host'] -1;
                  foreach($times as $item) {
                    if($_SESSION['host'] == $item['user_host'] ) {
                    echo  $item['rank']; //ここで自己順位表示
                    }
                  }
              ?>.
            </td>
            <td> <?php echo $user[$myhost]['name'];//ここで順位の横の名前 ?> </td>
          </tr>
        </table>
      </div>

      <h2 class="name"><?php echo $user[$test]['name'];//name ?></h2>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" 
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  
    crossorigin="anonymous">
  </script>
  <script src="./script/music.js"></script>
</body>
</html>