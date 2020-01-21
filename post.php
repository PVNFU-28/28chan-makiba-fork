<?php $conn = mysql_connect('localhost','root',''); $db = mysql_select_db('makiba',$conn);
$mysql_query("INSERT INTO makiba.posts (name,comment) VALUES ('Anonymous','".mysql_real_escape_string($_POST['comment'])."');
mysql_close();
header('location:posts.html'); ?>
