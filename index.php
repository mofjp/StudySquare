<?php
  include 'db_config.php';
  $user = [];
  try
  {
    // DBconnect
    $db = new PDO (PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // DB取得
    $stmt = $db->query("SELECT * FROM `user`");
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $db = null;   
     
     
    if (!empty($_POST)) 
    {
      //入力内容の代入      
      $getid = $_POST["user"];
      $getpass = $_POST["password"];
       
      //正誤判定
      foreach($user as $item)
      {
        if($getid == $item['user_id'] && $getpass == $item['password'] )
        {
          session_start();
          $_SESSION['host'] = $item['host'];
          header('Location:main.php');
        }
      }
     }
  }
  
  //DBunconnect
  catch(PDOException $e)
  {
   echo $e->getMessage();
   exit;
  }
?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <title>Login</title> 
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="./stylesheet/login_style.css">
    <link rel="icon" href="icon48.png">
</head>
<body>
 
<div class="login_menu">  
  
  <h1>Study Square</h1>

  <form action="https://web20269.azurewebsites.net/StudySquare/index.php" method="post">
    <input class="inputdata" type="text" name="user" placeholder="ID" required>
    <input class="inputdata" type="password" name="password" placeholder="Password" required>
    
    <?php
      if (!empty($_POST)) 
      {
        //エラーメッセージ
        if (!isset($row['user_id']) || !isset($row['password']))
        {
          echo '<p class="error">';
          echo 'メールアドレス又はパスワードが間違っています。';
          echo '</p>';
        }
      }
    ?>

    <input class="login" type="submit" value="Login">
  </form>


  
</div>



</body>