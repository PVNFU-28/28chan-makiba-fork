<?php
$msg = "";
//if upload button pressed
if (isset($_POST['upload'])){
  
  //the path to store the uploaded images
  $target = "images/".basename($_FILE['image']['name']);
  
  //connect to the database
  
  
$conn = mysqli_connect ($servername, $username, $password, "databasename");

//checking the connection
 
if (!$conn) {
  die("Connection is not working !!!" . mysqli_connect_error ());
}

echo "The connection is working ! " ;


//Get all the submited data from the form
$images = $FILE_['image']['name'];
$text = $_POST['text'];

$sql = "INSERT INTO images (images, text) VALUE( '$image',  '$text')";
mysqli_query($db, $sql); //stores the submitted data into the database tables: images

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
 
}else{
  
  $msg = "There was a problem uploading image";
  }



}


?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style>
  body{
        background-color:#eef2ff;
        background-image: linear-gradient(#d1d5ee,#eef2ff 200px);
        background-repeat: repeat-x;
}
.boardNav{color:#89a;}
.postNum a,.postNum a:visited,.reflink,body{color:black;}
.logo{color:#af0a0f;}
a,a:visited{color:#34345c;}
.sideArrows{color:#b7c5d9;}
#pager,.reply{
        border-right-style:solid;
        border-bottom-style:solid;
        border-color:#b7c5d9;
}
input[type="text"],input[type="password"],textarea{
        border-style:solid;
        border-color:#aaa;
}
input[type="text"]:focus,input[type="password"]:focus,textarea:focus{border-color:#98e;}
a:hover{color:#d00!important;}
.postblock,.postlists th{
        background-color:#98e;
        border-style:solid;
}
hr{border-color:#b7c5d9;}
.subject{color:#0f0c5d;}
.nameBlock{color:#117743;}
.postlists tr:nth-of-type(odd),.reply,#pager{background-color:#d6daf0;}
.postlists tr:target,table:target .post.reply{
        background-color:#d6bad0;
        border-color:#ba9dbf;
}
#errormsg{color:red}
.omittedposts{color:#707070}
.viewmode,.replymode{
        background-color:#0010E0;
        color:#fff;
}
.unkfunc{color:#789922;}
.unkfunc2{color:#FF69B3;}
.quotelink{color:#d00;}
.backlink a{color:#34345C;}
</style>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>
<div id="content">
  <?php
$conn = mysqli_connect ($servername, $username, $password, "databasename");
      while ($row = mysqli_fetch_array($result)) {
          $sql = "SELECT * FROM images";
       echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
      	echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }
  ?>
  <form method="POST" action="index.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea
      	id="text"
      	cols="40"
      	rows="4"
      	name="image_text"
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>
