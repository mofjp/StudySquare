<?php
  include 'db_config.php';
  $user = [];

  try
  {
     // DBconnect
     $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     // DB取得
     $stmt = $db->query("SELECT name FROM `user`");
     $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $db = null;
     session_start();
     $test =  $_SESSION['host'];
     
     echo $test;   
     
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   exit;
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>ようこそ</title>
</head>
<body>
    
<!--<h1>ようこそ</h1>-->
<h2><?php echo $user[$test]['name']; ?>さん、ようこそ。</h2>


</body>