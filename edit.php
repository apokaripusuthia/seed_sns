<?php
session_start();
require('dbconnect.php');

if(isset($_GET)) {
$sql = 'SELECT * FROM `tweets` WHERE `tweet_id`=?';
$data = array($_GET['tweet_id']);
$stmt = $dbh->prepare($sql);
$stmt->execute($data);
$tweet_edit = $stmt->fetch(PDO::FETCH_ASSOC);

}

// var_dump($tweet_edit);

if(!enpty($_POST)){
$sql = 'UPDATE `tweets` SET `tweet`=? , `modified`=NOW() WHERE `tweet_id`=?';
$data = array($_POST['tweet'], $_GET['tweet_id']);
$stmt = $dbh->prepare($sql);
$stmt->execute($data);

header('Location: index.php');
exit();
}

 ?>

 <!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>edit.php</title>
</head>
<body>
	 <div>
	 	<from method="POST" action="">
	 		  <input typ="text" name="tweet" value="<php echo $tweet_edit['tweet']; ?>">
	 		  	<input type="submit" value="更新">
	 		</from>
	 </div>
   </body>
</html>