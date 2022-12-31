<?php
  include 'loginCheck.php';
  include 'db_config.php';
    try
    {
      //  // DBconnect
        $db_stw = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        $db_stw->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       if(isset($_POST["time_post"])){
        
        $time = $_POST["time_post"];
        
        // SQL文をセット
        $stmt_stw = $db_stw->prepare('UPDATE time_ranking SET time = :time WHERE host = :host');
    
        // 値をセット
        $stmt_stw->bindValue(':time', $time);
        $stmt_stw->bindValue(':host', $_SESSION['host']);
        
        // SQL実行
        $stmt_stw->execute();
                
      }         
    }
    catch(PDOException $e)
    {
     echo $e->getMessage();
     exit;
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link rel="stylesheet" href="./stylesheet/timer_style.css">
  <link rel="icon" href="ss.png">
  <title>Timer</title>
  <script src="https://kit.fontawesome.com/834c03dcb0.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <a href="https://web20269.azurewebsites.net/StudySquare/main.php"><h1>Study Square</h1></a>
  </header>

  <div id="timer">
    <div id="container">

      <div id="mainpage">
        <form id="form1" action ="" name="timer" method="post">
          <p>ご利用時間は残り</p>
          <div class="ms">
            <input type="number" name = "m" min="0" max="999" value="">m
            <input type="number" name = "s" min="1" max="59" value="">s <span>です</span> <br>
          </div>

          <div id="buttons1">
            <button type="submit"  onclick="cntStart()">START</button>
            <input type="button" value="STOP" onclick="cntStop()">
          </div>
        </form>

        <div id="buttons2">
          <button id="back" onclick="location.href='main.php'"><i class="fa-solid fa-right-from-bracket"></i>退室</button>
          <form id="form2" method="post">
            <input id="time_post" name="time_post" type="hidden"> 
            <button id="submit" type="submit">
              <div class="svg-wrapper-1">
                <div class="svg-wrapper">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                  </svg>
                </div>
              </div>
              <span>送信</span>
            </button>
          </form>
        </div>
      </div>
      <!--<p>※ブラウザバックはご遠慮ください。<br> &emsp;正常に記録が行えない可能性があります。</p>-->
    </div>
  </div>
</body>
<script src='./script/timer.js'></script>
</html>