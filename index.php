<php
  date_default_timezone_set('Europe/Copenhagen');
    incude 'dbh.inc.php';
    incude 'comments.inc.php';

<HTML>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    test board</title>
    <link rel="stylesheet" type"text/css" href="Yotsuba-b.css">
    </head>
    
    
    <?php
     echo "<form>
    <input type='hidden' name='uid' value='Anonymous'>
    <input type='hidden' name='date' value'".date('Y-m-d H:i:s')."'>
    <textarea name='message'></textarea><br>
    <button type='submit' name='submit'>Comment</button>
</form>";

getComment($conn);
     
?>
  </body>
</HTML>
