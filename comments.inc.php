<?php

function setComments($conn) {
   if(isset($_POST['Comment'])){
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        
$sql = "INSERT INTO database name (uid, date, message) VALUES('" + $uid + "', '" + $date + "', '" + message + "')";
        $result = $conn->query($sql);
    
   }
}
function getComment($conn){
  $sql = "SELECT * FROM comments ";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){
      echo $row ['uid']."<br>";
      echo $row ['date']."<br>";
      echo $row ['message']."<br><br>";

  }

    
  }
  
